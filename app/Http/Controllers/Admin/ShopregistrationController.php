<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShopRegistrationRequest;
use App\Models\Shopregistration;
use App\Services\shopregistrationservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ShopregistrationController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/shopregistrations';

        //route

        $this->index_route_name = 'admin.shopregistrations.index';
        $this->create_route_name = 'admin.shopregistrations.create';
        $this->detail_route_name = 'admin.shopregistrations.show';
        $this->edit_route_name = 'admin.shopregistrations.edit';

        //view files

        $this->index_view = 'admin.shopregistration.index';
        $this->create_view = 'admin.shopregistration.create';
        $this->edit_view = 'admin.shopregistration.edit';

        //service files

        $this->shopregistration = new shopregistrationservice();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->shopregistration->datatable();

        if ($request->ajax()) {
            return view('admin.shopregistration.shopregistration_table', ['shop' => $items]);
        } else {
            return view('admin.shopregistration.index', ['shop' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(ShopRegistrationRequest $request)
    {
            $input = $request->except(['_token', 'proengsoft_jsvalidation']);
            $input['password'] = Hash::make($request->password);
            $input['c_password'] = Hash::make($request->c_password);

            $image = $request->file('work_place_photo');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['work_place_photo'] = $filename;

            $image1 = $request->file('profile_image');
            $filename1 = time() . $image1->getClientOriginalName();
            $destinationPath1 = public_path('/vehicalcategory/image/');
            $image1->move($destinationPath1, $filename1);
            $input['profile_image'] = $filename1;

            $battle = $this->shopregistration->create($input);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('created', 'Care', 1));
    }

    public function show(Shopregistration $shopregistration)
    {
        return view($this->detail_view, compact('shopregistration'));
    }

    public function edit(Shopregistration $shopregistration)
    {
        return view($this->edit_view, compact('shopregistration'));
    }

    public function update(Request $request,Shopregistration $shopregistration)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['work_place_photo']) || !empty($input['profile_image'])) 
        {
            $image = $request->file('work_place_photo');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['work_place_photo'] = $filename;

            $image1 = $request->file('profile_image');
            $filename1 = time() . $image1->getClientOriginalName();
            $destinationPath1 = public_path('/vehicalcategory/image/');
            $image1->move($destinationPath1, $filename1);
            $input['profile_image'] = $filename1;

            $this->shopregistration->update($input, $shopregistration);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('updated', 'update shop registration', 1));
        
        } else {

            $this->shopregistration->update($input, $shopregistration);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('updated', 'update shop registration', 1));
        
        }
    }

    public function destroy($id)
    {
        $result = DB::table('shop_registrations')->where('shop_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('shop delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('shop delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
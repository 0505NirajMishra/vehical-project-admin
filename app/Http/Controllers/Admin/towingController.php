<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TowingRequest;
use App\Models\Towing;
use App\Models\User;

use App\Models\VehicalCategory;
use App\Services\towingservices;
use App\Services\UserService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class towingController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/towings';

        //route

        $this->index_route_name = 'admin.towings.index';
        $this->create_route_name = 'admin.towings.create';
        $this->detail_route_name = 'admin.towings.show';
        $this->edit_route_name = 'admin.towings.edit';

        //view files

        $this->index_view = 'admin.towing.index';
        $this->create_view = 'admin.towing.create';
        $this->edit_view = 'admin.towing.edit';

        //service files

        $this->towingservice = new towingservices();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->towingservice->datatable();

        if ($request->ajax()) {
            return view('admin.towing.towing_table', ['towing' => $items]);
        } else {
            return view('admin.towing.index', ['towing' => $items]);
        }

    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->create_view,$data);
    }

    public function store(TowingRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']); 

        $image = $request->file('vehical_photo');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo'] = $filename;

        $battle = $this->towingservice->create($input);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('created', 'towing', 1));
    }

    public function show(Towing $towing)
    {
        return view($this->detail_view, compact('towing'));
    }

    public function edit(Towing $towing)
    {   
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->edit_view, compact('towing','data'));
    }

    public function update(TowingRequest $request,Towing $towing)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image = $request->file('vehical_photo');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo'] = $filename;

        $this->towingservice->update($input, $towing);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'update towing', 1));
    }

    public function destroy($id)
    {
        $result = DB::table('towings')->where('towing_id', $id)->delete();
        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('towing delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('towing delete'),
                'status_name' => 'error',
            ]);
        }

    }

    public function active($id, $status)
    {
        $update=array('status' => $status);
        $result = towingservices::status($update,$id);

        $storedata = Towing::where('petrol_id',$id)->first();             
        $user = User::where('id',$storedata->user_id)->first();
        $result = UserService::status($update,$storedata->user_id);

        return redirect()->back()->withSuccess('Status Update Successfully!');
        
    }
    
}
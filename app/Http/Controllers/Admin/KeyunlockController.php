<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KeyunlockRequest;
use App\Models\Keyunlock;
use App\Models\Addservice;
use App\Models\VehicalCategory;
use App\Services\keyunlockservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeyunlockController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/keyunlocks';

        //route

        $this->index_route_name = 'admin.keyunlocks.index';
        $this->create_route_name = 'admin.keyunlocks.create';
        $this->detail_route_name = 'admin.keyunlocks.show';
        $this->edit_route_name = 'admin.keyunlocks.edit';

        //view files

        $this->index_view = 'admin.keyunlock.index';
        $this->create_view = 'admin.keyunlock.create';
        $this->edit_view = 'admin.keyunlock.edit';

        //service files

        $this->keyunlock = new keyunlockservices();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->keyunlock->datatable();

        if ($request->ajax()) {
            return view('admin.keyunlock.keyunlock_table', ['keyunlock' => $items]);
        } else {
            return view('admin.keyunlock.index', ['keyunlock' => $items]);
        }

    }

    public function create()
    {   
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);     
        return view($this->create_view,$data);
    }

    public function store(KeyunlockRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']); 

        $image = $request->file('vehical_photo');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo'] = $filename;

        $battle = $this->keyunlock->create($input);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('created', 'Keyunlock', 1));
    }

    public function show(Keyunlock $keyunlock)
    {
        return view($this->detail_view, compact('keyunlock'));
    }

    public function edit(Keyunlock $keyunlock)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);     
        return view($this->edit_view, compact('keyunlock','data'));
    }

    public function update(KeyunlockRequest $request,Keyunlock $keyunlock)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image = $request->file('vehical_photo');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo'] = $filename;

        $this->keyunlock->update($input, $keyunlock);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'update keyunlock', 1));
    }

    public function destroy($id)
    {
        $result = DB::table('keyunlocks')->where('keyunlocks_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('keyunlock delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('keyunlock delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
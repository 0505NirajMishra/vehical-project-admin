<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShopEmployeeRequest;
use App\Models\shopemployee;
use App\Models\VehicalCategory;
use App\Models\Addservice;
use App\Services\shopemployeeservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopEmployeeController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/shopemployees';

        //route

        $this->index_route_name = 'admin.shopemployees.index';
        $this->create_route_name = 'admin.shopemployees.create';
        $this->detail_route_name = 'admin.shopemployees.show';
        $this->edit_route_name = 'admin.shopemployees.edit';

        //view files

        $this->index_view = 'admin.shopemployee.index';
        $this->create_view = 'admin.shopemployee.create';
        $this->edit_view = 'admin.shopemployee.edit';

        //service files

        $this->shopemployee = new shopemployeeservices();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->shopemployee->datatable();

        if ($request->ajax()) {
            return view('admin.shopemployee.shopemployee_table', ['shopemployee' => $items]);
        } else {
            return view('admin.shopemployee.index', ['shopemployee' => $items]);
        }

    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        $data1['addservices'] = Addservice::get(["service_name","service_id"]);

        return view($this->create_view,$data,$data1);
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $battle = $this->shopemployee->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'shop employee', 1));
    }

    public function show(shopemployee $shopemployee)
    {
        return view($this->detail_view, compact('shopemployee'));
    }

    public function edit(shopemployee $shopemployee)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        $data1 = Addservice::get(["service_name","service_id"]);
        
        return view($this->edit_view, compact('shopemployee','data','data1'));
    }

    public function update(ShopEmployeeRequest $request,shopemployee $shopemployee)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->shopemployee->update($input, $shopemployee);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'shop employee update', 1));
    }

    public function destroy($id)
    {
        $result = DB::table('shopemployees')->where('shopemployee_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('shop employee delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('shop employee delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
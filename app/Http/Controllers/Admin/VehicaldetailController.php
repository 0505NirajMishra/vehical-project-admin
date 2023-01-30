<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicalDetailRequest;
use App\Models\VehicalDetail;
use App\Models\VehicalCategory;
use App\Services\vehicaldetailservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicaldetailController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/addvehicaldetails';

        //route

        $this->index_route_name = 'admin.addvehicaldetails.index';
        $this->create_route_name = 'admin.addvehicaldetails.create';
        $this->detail_route_name = 'admin.addvehicaldetails.show';
        $this->edit_route_name = 'admin.addvehicaldetails.edit';

        //view files

        $this->index_view = 'admin.vehicaldetail.index';
        $this->create_view = 'admin.vehicaldetail.create';
        $this->edit_view = 'admin.vehicaldetail.edit';

        //service files

        $this->vehicaldetail = new vehicaldetailservice();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');


    }

    public function index(Request $request)
    {
        $items = $this->vehicaldetail->datatable();

        if($request->ajax()) 
        {
            return view('admin.vehicaldetail.vehicaldetail_table', ['vehicaldetail' => $items]);
        } else {
            return view('admin.vehicaldetail.index', ['vehicaldetail' => $items]);
        }

    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_name","vehical_type","vehical_catgeory_id"]);
        return view($this->create_view,$data);
    }

    public function store(VehicalDetailRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image = $request->file('vehical_photo');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo'] = $filename;

        $battle = $this->vehicaldetail->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'vehical add detail', 1));
    }

    public function show(VehicalDetail $addvehicaldetail)
    {
        return view($this->detail_view, compact('addvehicaldetail'));
    }

    public function edit(VehicalDetail $addvehicaldetail)
    {
        $data = VehicalCategory::get(["vehical_name","vehical_type","vehical_catgeory_id"]);
        return view($this->edit_view, compact('addvehicaldetail','data'));
    }

    public function update(VehicalDetailRequest $request, VehicalDetail $addvehicaldetail)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        
        if (!empty($input['vehical_photo'])) 
        {
            $image = $request->file('vehical_photo');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['vehical_photo'] = $filename;

            $this->vehicaldetail->update($input, $addvehicaldetail);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical update', 1));
        
        } else {

            $this->vehicaldetail->update($input, $addvehicaldetail);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical update', 1));
        
        }

    }

    public function destroy($id)
    {
        $result = DB::table('vehicaladddetails')->where('vehicaladddetail_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical delete'),
                'status_name' => 'success',
            ]);

        } else 
        {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
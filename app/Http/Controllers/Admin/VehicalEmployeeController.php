<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicalEmployeeRequest;
use App\Models\VehicalEmployee;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use App\Services\vehicalemployeeservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicalEmployeeController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/vehicalemployees';

        //route

        $this->index_route_name = 'admin.vehicalemployees.index';
        $this->create_route_name = 'admin.vehicalemployees.create';
        $this->detail_route_name = 'admin.vehicalemployees.show';
        $this->edit_route_name = 'admin.vehicalemployees.edit';

        //view files

        $this->index_view = 'admin.vehicalemployee.index';
        $this->create_view = 'admin.vehicalemployee.create';
        $this->edit_view = 'admin.vehicalemployee.edit';

        //service files

        $this->vehicalemployee = new vehicalemployeeservice();
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->vehicalemployee->datatable();

        if ($request->ajax()) {
            return view('admin.vehicalemployee.vehicalemployee_table', ['vehicalemployee' => $items]);
        } else {
            return view('admin.vehicalemployee.index', ['vehicalemployee' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(VehicalEmployeeRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $image = $request->file('vehical_employee_profile');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_employee_profile'] = $filename;
        $battle = $this->vehicalemployee->create($input);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('created', 'vehical employee', 1));
    }

    public function show(VehicalEmployee $vehicalemployee)
    {
        return view($this->detail_view, compact('vehicalemployee'));
    }

    public function edit(VehicalEmployee $vehicalemployee)
    {
        return view($this->edit_view, compact('vehicalemployee'));
    }

    public function update(VehicalEmployeeRequest $request,VehicalEmployee $vehicalemployee)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['vehical_employee_profile'])) 
        {
            $image = $request->file('vehical_employee_profile');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['vehical_employee_profile'] = $filename;

            $this->vehicalemployee->update($input, $vehicalemployee);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical employee update', 1));

        } else {

            $this->vehicalemployee->update($input, $vehicalemployee);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical employee update', 1));
        
        }

    }

    public function destroy($id)
    {
        $result = DB::table('vehicalemployees')->where('vehical_employee_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical employee delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical employee delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
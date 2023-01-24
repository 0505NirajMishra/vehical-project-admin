<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Models\Addservice;
use App\Services\addservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddServiceController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/addservices';

        //route

        $this->index_route_name = 'admin.addservices.index';
        $this->create_route_name = 'admin.addservices.create';
        $this->detail_route_name = 'admin.addservices.show';
        $this->edit_route_name = 'admin.addservices.edit';

        //view files

        $this->index_view = 'admin.addservice.index';
        $this->create_view = 'admin.addservice.create';
        $this->edit_view = 'admin.addservice.edit';

        //service files

        $this->addservice = new addservices();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->addservice->datatable();

        if ($request->ajax()) 
        {
            return view('admin.addservice.addservice_table', ['service' => $items]);
        } else {
            return view('admin.addservice.index', ['service' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(AddServiceRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $battle = $this->addservice->create($input);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('created', 'add service', 1));
    }

    public function show(Addservice $addservice)
    {
        return view($this->detail_view, compact('addservice'));
    }

    public function edit(Addservice $addservice)
    {
        return view($this->edit_view, compact('addservice'));
    }

    public function update(AddServiceRequest $request,Addservice $addservice)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->addservice->update($input, $addservice);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'update add service', 1));

    }

    public function destroy($id)
    {
        $result = DB::table('addservices')->where('service_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('service delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('service delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
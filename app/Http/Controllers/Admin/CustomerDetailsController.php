<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerDetailRequest;
use App\Models\CustomerDetail;
use App\Services\customerdetailservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerDetailsController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/customerdetails';

        //route

        $this->index_route_name = 'admin.customerdetails.index';
        $this->create_route_name = 'admin.customerdetails.create';
        $this->detail_route_name = 'admin.customerdetails.show';
        $this->edit_route_name = 'admin.customerdetails.edit';

        //view files

        $this->index_view = 'admin.customerdetail.index';
        $this->create_view = 'admin.customerdetail.create';
        $this->edit_view = 'admin.customerdetail.edit';

        //service files

        $this->customerdetail = new customerdetailservice();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->customerdetail->datatable();

        if ($request->ajax()) {
            return view('admin.customerdetail.customerdetail_table', ['customer' => $items]);
        } else {
            return view('admin.customerdetail.index', ['customer' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(CustomerDetailRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $battle = $this->customerdetail->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'add customer detail', 1));
    }

    public function show(CustomerDetail $customerdetail)
    {
        return view($this->detail_view, compact('customerdetail'));
    }

    public function edit(CustomerDetail $customerdetail)
    {
        return view($this->edit_view, compact('customerdetail'));
    }

    public function update(CustomerDetailRequest $request,CustomerDetail $customerdetail)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->customerdetail->update($input, $customerdetail);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'customer detail update', 1));

    }

    public function destroy($id)
    {
        $result = DB::table('customerdetails')->where('customer_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('customer delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('customer delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
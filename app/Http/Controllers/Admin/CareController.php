<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareRequest;
use App\Models\Care;
use App\Services\careservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/cares';

        //route

        $this->index_route_name = 'admin.cares.index';
        $this->create_route_name = 'admin.cares.create';
        $this->detail_route_name = 'admin.cares.show';
        $this->edit_route_name = 'admin.cares.edit';

        //view files

        $this->index_view = 'admin.care.index';
        $this->create_view = 'admin.care.create';
        $this->edit_view = 'admin.care.edit';

        //service files

        $this->careservice = new careservices();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->careservice->datatable();

        if ($request->ajax()) {
            return view('admin.care.care_table', ['care' => $items]);
        } else {
            return view('admin.care.index', ['care' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(CareRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $battle = $this->careservice->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'Care', 1));
    }

    public function show(Care $care)
    {
        return view($this->detail_view, compact('care'));
    }

    public function edit(Care $care)
    {
        return view($this->edit_view, compact('care'));
    }

    public function update(CareRequest $request,Care $care)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->careservice->update($input, $care);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'care update', 1));
    }

    public function destroy($id)
    {
        $result = DB::table('cares')->where('care_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('care delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('care delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
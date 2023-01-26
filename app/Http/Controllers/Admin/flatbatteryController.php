<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\flatBatteryRequest;
use App\Models\flatBattery;
use App\Models\VehicalCategory;
use App\Services\flatbatteryservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class flatbatteryController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/flatbatterys';

        //route

        $this->index_route_name = 'admin.flatbatterys.index';
        $this->create_route_name = 'admin.flatbatterys.create';
        $this->detail_route_name = 'admin.flatbatterys.show';
        $this->edit_route_name = 'admin.flatbatterys.edit';

        //view files

        $this->index_view = 'admin.flatbattery.index';
        $this->create_view = 'admin.flatbattery.create';
        $this->edit_view = 'admin.flatbattery.edit';

        //service files

        $this->flatbattery = new flatbatteryservice();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->flatbattery->datatable();

        if ($request->ajax()) {
            return view('admin.flatbattery.flatbattery_table', ['flat' => $items]);
        } else {
            return view('admin.flatbattery.index', ['flat' => $items]);
        }

    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->create_view,$data);
    }

    public function store(flatBatteryRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image = $request->file('vehical_image');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_image'] = $filename;

        $image1 = $request->file('battery_photo');
        $filename1 = time() . $image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehicalcategory/image/');
        $image1->move($destinationPath1, $filename1);
        $input['battery_photo'] = $filename1;

        $battle = $this->flatbattery->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'successfully', 1));
    }

    public function show(flatBattery $flatbattery)
    {
        return view($this->detail_view, compact('flatbattery'));
    }

    public function edit(flatBattery $flatbattery)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->edit_view,compact('flatbattery','data'));
    }

    public function update(flatBatteryRequest $request,flatBattery $flatbattery)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['vehical_image']) || !empty($input['battery_photo'])) 
        {
            $image = $request->file('vehical_image');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['vehical_image'] = $filename;

            $image1 = $request->file('battery_photo');
            $filename1 = time() . $image1->getClientOriginalName();
            $destinationPath1 = public_path('/vehicalcategory/image/');
            $image1->move($destinationPath1, $filename1);
            $input['battery_photo'] = $filename1;

            $this->flatbattery->update($input, $flatbattery);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('updated', 'successfully', 1));

        } else {

            $this->flatbattery->update($input, $flatbattery);
            return redirect()->route($this->index_route_name)->with('success',
            $this->mls->messageLanguage('updated', 'successfully', 1));
        
        }

    }

    public function destroy($id)
    {
        $result = DB::table('flatbatterys')->where('flatbattery_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('flat battery delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('flat battery delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
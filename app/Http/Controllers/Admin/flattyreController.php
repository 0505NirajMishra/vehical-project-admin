<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\flattyreRequest;
use App\Models\flattyre;
use App\Models\VehicalCategory;
use App\Services\flattyreservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class flattyreController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/flattyres';

        //route

        $this->index_route_name = 'admin.flattyres.index';
        $this->create_route_name = 'admin.flattyres.create';
        $this->detail_route_name = 'admin.flattyres.show';
        $this->edit_route_name = 'admin.flattyres.edit';

        //view files

        $this->index_view = 'admin.flattyre.index';
        $this->create_view = 'admin.flattyre.create';
        $this->edit_view = 'admin.flattyre.edit';

        //service files

        $this->flattyre = new flattyreservice();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->flattyre->datatable();
        if ($request->ajax()) {
            return view('admin.flattyre.flattyre_table', ['flattyre' => $items]);
        } else {
            return view('admin.flattyre.index', ['flattyre' => $items]);
        }
    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->create_view,$data);
    }

    public function store(flattyreRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image = $request->file('tyresize_image');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['tyresize_image'] = $filename;

        $battle = $this->flattyre->create($input);
        return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('created', 'successfully', 1));
    
    }

    public function show(flattyre $flattyre)
    {
        return view($this->detail_view, compact('flattyre'));
    }

    public function edit(flattyre $flattyre)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->edit_view,compact('flattyre','data'));
    }

    public function update(flattyreRequest $request,flattyre $flattyre)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['tyresize_image'])) 
        {
            $image = $request->file('tyresize_image');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['tyresize_image'] = $filename;

            $this->flattyre->update($input, $flattyre);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'successfully', 1));

        } else {
            $this->flattyre->update($input, $flattyre);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'successfully', 1));
        }

    }

    public function destroy($id)
    {
        $result = DB::table('flattyres')->where('flattyre_id', $id)->delete();

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
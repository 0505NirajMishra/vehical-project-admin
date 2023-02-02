<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicalCategoryRequest;
use App\Models\VehicalCategory;
use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use App\Services\vehicalcategoryservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileService;
use Illuminate\Support\Facades\Image;

class VehicalCategoryController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/vehicaltypes';

        //route

        $this->index_route_name = 'admin.vehicaltypes.index';
        $this->create_route_name = 'admin.vehicaltypes.create';
        $this->detail_route_name = 'admin.vehicaltypes.show';
        $this->edit_route_name = 'admin.vehicaltypes.edit';

        //view files

        $this->index_view = 'admin.vehicalcategory.index';
        $this->create_view = 'admin.vehicalcategory.create';
        $this->edit_view = 'admin.vehicalcategory.edit';

        //service files

        $this->vehicategory = new vehicalcategoryservice();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->vehicategory->datatable();

        if ($request->ajax()) {
            return view('admin.vehicalcategory.vehicalcategory_table', ['vehicalcategory' => $items]);
        } else {
            return view('admin.vehicalcategory.index', ['vehicalcategory' => $items]);
        }

    }

    public function create()
    {
        return view($this->create_view);
    }

    public function store(VehicalCategoryRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);      

        // $logo=FileService::multipleImageUploader($request,'vehical_logo','newvehicalfolder/image/');
        // $input['vehical_logo']= json_encode($logo);    
        // if($request->vehical_logo)
        // {
        //          foreach($request->file('vehical_logo') as $image)
        //          {
        //                  $name=$image->getClientOriginalName();
        //                  $image->move(public_path().'/image/',$name);
        //                  $data[] = $name;
        //          }
        // }
        // $input['vehical_logo'] = json_encode($data);

        $vehical_logo=[];

        foreach ($request->vehical_logo as $image) {
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/' . $image_name;
            Image::make($image)->save(public_path($image_path));
            array_push($vehical_logo, $image_path);
        }
        $input['vehical_logo'] = $vehical_logo;
        
        $battle = $this->vehicategory->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'vehical category', 1));
        
    }

    public function show(VehicalCategory $vehicaltype)
    {
        return view($this->detail_view, compact('vehicaltype'));
    }

    public function edit(VehicalCategory $vehicaltype)
    {
        return view($this->edit_view, compact('vehicaltype'));
    }

    public function update(VehicalCategoryRequest $request, VehicalCategory $vehicaltype)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['vehical_logo'])) 
        {
            $image = $request->file('vehical_logo');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['vehical_logo'] = $filename;

            $this->vehicategory->update($input, $vehicaltype);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical category update', 1));

        } else {

            $this->vehicategory->update($input, $vehicaltype);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'vehical category update', 1));
        
        }

    }

    public function destroy($id)
    {
        $result = DB::table('vehicalcategorys')->where('vehical_catgeory_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical category delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical category delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
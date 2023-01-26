<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PetroldesielRequest;
use App\Models\PetrolDesiel;
use App\Models\VehicalCategory;
use App\Models\Addservice;
use App\Services\petroldesielservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetroldesielController extends Controller
{

    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/petroldesials';

        //route

        $this->index_route_name = 'admin.petroldesials.index';
        $this->create_route_name = 'admin.petroldesials.create';
        $this->detail_route_name = 'admin.petroldesials.show';
        $this->edit_route_name = 'admin.petroldesials.edit';

        //view files

        $this->index_view = 'admin.petroldesiel.index';
        $this->create_view = 'admin.petroldesiel.create';
        $this->edit_view = 'admin.petroldesiel.edit';

        //service files

        $this->petroldesiel = new petroldesielservices();
        
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->petroldesiel->datatable();

        if ($request->ajax()) {
            return view('admin.petroldesiel.petrol_table', ['petrol' => $items]);
        } else {
            return view('admin.petroldesiel.index', ['petrol' => $items]);
        }

    }

    public function create()
    {
        $data['vehicalcategorys'] = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->create_view,$data);
    }

    public function store(PetroldesielRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image = $request->file('vehical_image');
        $filename = time() . $image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_image'] = $filename;

        $battle = $this->petroldesiel->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'successfully', 1));
    }

    public function show(PetrolDesiel $petroldesial)
    {
        return view($this->detail_view, compact('petroldesial'));
    }

    public function edit(PetrolDesiel $petroldesial)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        return view($this->edit_view,compact('petroldesial','data'));
    }

    public function update(PetroldesielRequest $request,PetrolDesiel $petroldesial)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if (!empty($input['vehical_image'])) 
        {
            $image = $request->file('vehical_image');
            $filename = time() . $image->getClientOriginalName();
            $destinationPath = public_path('/vehicalcategory/image/');
            $image->move($destinationPath, $filename);
            $input['vehical_image'] = $filename;

            $this->petroldesiel->update($input, $petroldesial);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'successfully', 1));

        } else {

            $this->petroldesiel->update($input, $petroldesial);
            return redirect()->route($this->index_route_name)->with('success',$this->mls->messageLanguage('updated', 'successfully', 1));
        
        }

    }

    public function destroy($id)
    {
        $result = DB::table('petroldesiels')->where('petrol_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) 
        {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('petrol delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('petrol delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
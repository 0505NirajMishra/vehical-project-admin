<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Models\Feedback;
use App\Models\VehicalCategory;
use App\Models\Addservice;
use App\Services\FeedbackServices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/feedbacks';

        //route

        $this->index_route_name = 'admin.feedbacks.index';
        $this->create_route_name = 'admin.feedbacks.create';
        $this->detail_route_name = 'admin.feedbacks.show';
        $this->edit_route_name = 'admin.feedbacks.edit';

        //view files

        $this->index_view = 'admin.feedback.index';
        $this->create_view = 'admin.feedback.create';
        $this->edit_view = 'admin.feedback.edit';

        //service files

        $this->feedbackservice = new FeedbackServices();

        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages');

    }

    public function index(Request $request)
    {
        $items = $this->feedbackservice->datatable();

        if ($request->ajax()) 
        {
            return view('admin.feedback.feedback_table', ['feedback' => $items]);
        } else {
            return view('admin.feedback.index', ['feedback' => $items]);
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
        $battle = $this->feedbackservice->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'feedback', 1));
    }

    public function show(Feedback $feedback)
    {
        return view($this->detail_view, compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        $data = VehicalCategory::get(["vehical_type","vehical_catgeory_id"]);
        $data1 = Addservice::get(["service_name","service_id"]);
        
        return view($this->edit_view,$data,compact('feedback','data','data1'));
    }

    public function update(FeedbackRequest $request,Feedback $feedback)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->feedbackservice->update($input, $feedback);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'feedback update', 1));
    }

    public function destroy($id)
    {
        $result = DB::table('feedbacks')->where('feedback_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('feedback delete'),
                'status_name' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('feedback delete'),
                'status_name' => 'error',
            ]);
        }

    }

}
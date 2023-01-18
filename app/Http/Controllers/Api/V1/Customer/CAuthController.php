<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiConsultantLoginRequest;
use App\Http\Requests\ApiRegisterRequest;

use App\Http\Requests\Admin\HostelSerRequest;

use App\Http\Requests\Admin\VehicalCategoryRequest;

use App\Http\Requests\Admin\VehicalEmployeeRequest;

use App\Http\Requests\ApiChangePasswordRequest;
use App\Http\Requests\ApiConsultantRequest;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Services\Api\AuthService;
use App\Models\User;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\ConsultantService;
use App\Services\WalletService;
use Illuminate\Http\Request;

class CAuthController extends Controller
{

    protected $helperService, $userService, $apiAuthService,$walletService;

    public function __construct()
    {
        $this->helperService = new HelperService();
        $this->userService = new UserService(); 
        $this->apiAuthService = new AuthService();
    }

 
    
    public function login(ApiLoginRequest $request)
    {
        return $this->apiAuthService->login($request);
    }

     
    public function register(ApiRegisterRequest $request)
    {
        $request->merge(['role' => 'Customer']);
        return $this->apiAuthService->register($request);
    }



    // post doctor 

    public function adddoctor(DoctorRequest $request)
    {
        return $this->apiAuthService->adddoctor($request);
    } 

    // add hostel appoinment 

    public function addhostelappoinment(HostelAppoinmentRequest $request)
    {
        return $this->apiAuthService->addhostelappoinment($request);
    }



    // add vehical type 

    public function addvehicalcategory(VehicalCategoryRequest $request)
    {
        return $this->apiAuthService->addvehicalcategory($request);
    }

    // get vehical type

    public function getaddvehical()
    {
        return $this->apiAuthService->getaddvehical();
    }

    // delete vehical 

    public function deletevehical($id)
    {
        return $this->apiAuthService->deletevehical($id);
    } 

    // update vehical 

    public function updatevehical(Request $request,$id)
    {
        return $this->apiAuthService->updatevehical($request,$id);
    }

    // add vehical type 

    public function addemployee(VehicalEmployeeRequest $request)
    {
        return $this->apiAuthService->addemployee($request);
    }

    // get vehical type

    public function getemployee()
    {
        return $this->apiAuthService->getemployee();
    }

    // delete vehical 

    public function deleteemployee($id)
    {
        return $this->apiAuthService->deleteemployee($id);
    } 

    // update vehical 

    public function updateemployee(Request $request,$id)
    {
        return $this->apiAuthService->updateemployee($request,$id);
    }


    // get hostel profile 

    public function gethostelprofile()
    {
        return $this->apiAuthService->gethostelprofile();
    }

    // get hostel appoinment 

    public function gethostelappoinment()
    {
        return $this->apiAuthService->gethostelappoinment();
    }

    // add doctor availbilty 

    public function docavailbilty(DoctorAvaRequest $request)
    {
        return $this->apiAuthService->docavailbilty($request);
    }

    // delete doctor availbilty 

    public function deletedocavailbilty($id)
    {
        return $this->apiAuthService->deletedocavailbilty($id);
    } 

    // update doctor availbilty 

    public function updatedocavailbilty(Request $request,$id)
    {
        return $this->apiAuthService->updatedocavailbilty($request,$id);
    }


    //Get All Category 

    public function get_category()
    {
        return $this->apiAuthService->get_category();
    }

    // get All Subcategory

    public function get_subcategory()
    {
        return $this->apiAuthService->get_subcategory();
    }

    public function get_package(Request $request)
    {
        return $this->apiAuthService->get_package($request);   
    }
 
     /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        return $this->apiAuthService->logout($request);
    }
   
}
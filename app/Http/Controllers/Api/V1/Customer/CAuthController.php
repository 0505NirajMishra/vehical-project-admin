<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiConsultantLoginRequest;
use App\Http\Requests\ApiRegisterRequest;

use App\Http\Requests\Admin\HostelSerRequest;
use App\Http\Requests\Admin\VehicalCategoryRequest;
use App\Http\Requests\Admin\VehicalEmployeeRequest;
use App\Http\Requests\Admin\AddServiceRequest;
use App\Http\Requests\Admin\FeedbackRequest;
use App\Http\Requests\Admin\CustomerDetailRequest;
use App\Http\Requests\Admin\KeyunlockRequest;
use App\Http\Requests\Admin\TowingRequest;
use App\Http\Requests\Admin\CareRequest;
use App\Http\Requests\Admin\ShopEmployeeRequest;
use App\Http\Requests\Admin\VehicalDetailRequest;
use App\Http\Requests\Admin\flattyreRequest;
use App\Http\Requests\Admin\flatBatteryRequest;
use App\Http\Requests\Admin\PetroldesielRequest;
use App\Http\Requests\Admin\ShopRegistrationRequest;

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


    // add services

    public function addservice(AddServiceRequest $request)
    {
        return $this->apiAuthService->addservice($request);
    }

    // add flattyre

    public function addflattyre(flattyreRequest $request)
    {
        return $this->apiAuthService->addflattyre($request);
    }

    // add flatbattery

    public function addflatbattery(flatBatteryRequest $request)
    {
        return $this->apiAuthService->addflatbattery($request);
    }

    // add petrol/desiel

    public function addpetroldesiel(PetroldesielRequest $request)
    {
        return $this->apiAuthService->addpetroldesiel($request);
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

    // get flattyre List

    public function getflattyrelist(){
        return $this->apiAuthService->getflattyrelist();
    }

    // get flatbattery List

    public function getFlatBatteryList(){
        return $this->apiAuthService->getFlatBatteryList();
    }

    // get petrol desiel List

    public function getPetrolDesielList(){
        return $this->apiAuthService->getPetrolDesielList();
    }

    // get keyunlock List
    
    public function getkeyunlockList()
    {
        return $this->apiAuthService->getkeyunlockList();
    }

    // get towing List
    
    public function gettowingList()
    {
        return $this->apiAuthService->gettowingList();
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

    // shop registration detail

    public function shopregistration(ShopRegistrationRequest $request)
    {
        return $this->apiAuthService->shopregistration($request);
    }

    // vehical add detail

    public function addvehicaldetail(VehicalDetailRequest $request)
    {
        return $this->apiAuthService->addvehicaldetail($request);
    }

    // get employee

    public function getemployee()
    {
        return $this->apiAuthService->getemployee();
    }

    // get services 

    public function getservice()
    {
        return $this->apiAuthService->getservice();
    }

    
    // add keyunlock

    public function addkeyunlock(KeyunlockRequest $request)
    {
        return $this->apiAuthService->addkeyunlock($request);
    }

    

    // add towing
    public function addtowing(TowingRequest $request)
    {
        return $this->apiAuthService->addtowing($request);
    }
 

    // get feedback list
    public function getfeedback()
    {
        return $this->apiAuthService->getfeedback();
    }

    // add feedback 
    public function addfeedback(FeedbackRequest $request)
    {
        return $this->apiAuthService->addfeedback($request);
    }

    // get customer detail
    
    public function customerdetail()
    {
        return $this->apiAuthService->customerdetail();
    }

    // add customer detail

    public function addcustomerdetail(CustomerDetailRequest $request)
    {
        return $this->apiAuthService->addcustomerdetail($request);
    }

    // get shop employee

    public function getshopemployee()
    {
        return $this->apiAuthService->getshopemployee();
    }

    // add shop employee

    public function addshopemployee(ShopEmployeeRequest $request)
    {
        return $this->apiAuthService->addshopemployee($request);
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
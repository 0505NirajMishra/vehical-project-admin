<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;

use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;

use App\Services\Api\AuthService;
use App\Models\User;

use App\Services\HelperService;
use App\Services\UserService;
use App\Services\ConsultantService;
use App\Services\WalletService;

use Illuminate\Http\Request;

class LoginController extends Controller
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
<?php

use App\Http\Controllers\Api\V1\Customer\CTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/test', 'Api\V1\TestController@test');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/service',[PetController::class,'store']);

Route::group(['middleware' => ['optimizeImages'], 'prefix' => '/v1/customer', 'namespace' => 'Api\V1\Customer'], function () {
    
    Route::get('/test', [CTestController::class, 'test']);
    
    // -------- Register And Login API ----------
    Route::controller(CAuthController::class)->group(function () 
    {
        Route::post('login', 'login');
        Route::post('register', 'register');
        
        // vehcial category type 

        Route::post('addvehicalcategory','addvehicalcategory');
        Route::post('getaddvehical','getaddvehical');
        Route::post('deletevehical/{id}','deletevehical');
        Route::post('updatevehical/{id}','updatevehical');

        // vehical employee type

        Route::post('addemployee','addemployee');
        Route::post('getemployee','getemployee');
        Route::post('deleteemployee/{id}','deleteemployee');
        Route::post('updateemployee/{id}','updateemployee');


    });


    // -------- Register And Login API ----------
    Route::group(['middleware' => ['jwt.auth']], function () {
        /* logout APi */
        Route::controller(CAuthController::class)->group(function () {
            Route::post('change_password', 'change_password');
            Route::post('user_edit_profile', 'user_edit_profile');
            Route::post('update_notification', 'update_notification');
            Route::post('user_change_password', 'user_change_password');
            Route::post('rating', 'rating');
            Route::post('review', 'review');

            Route::post('consultant_edit_profile', 'consultant_edit_profile');
            Route::post('logout', 'logout');
        });

        /* Profile Controller */
        Route::controller(CProfileController::class)->group(function () {
            /*Profile API */
            Route::get('profile', 'profile');
            Route::put('update-profile', 'updateProfile');
            Route::post('update-profile-image', 'updateProfileImage');
        });
    });
});
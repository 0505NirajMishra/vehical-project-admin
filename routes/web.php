<?php

use App\Http\Controllers\Admin\AdminErrorPageController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\Admin\SubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('admin.dashboard');
});
// Route::get('/admin', function () {
//     return redirect('/admin/dashboard');
// });
Auth::routes(['register' => false]);
// Route::get('/test', 'TestController@test');
// Route::controller(TestController::class)->group(function () {
//     //
// });
Route::get('/admin/test', 'TestController@test');



Route::group(['middleware' => ['optimizeImages'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
    });
    Route::controller(AdminErrorPageController::class)->group(function () {
        Route::get('/404', 'pageNotFound')->name('notfound');
        Route::get('/500', 'serverError')->name('server_error');
    });
    Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/test', 'test')->name('test');
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('dashboard-counts', 'dashboardCountsData')->name('dashboard-counts');
        });

        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('change-password', 'changePassword')->name('change_password');
            Route::put('change-password/{user}', 'updatePassword')->name('update.password');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        

        Route::controller(UserController::class)->group(function () {
            Route::get('/update_language/{user}/{language}', 'updateLanguage')->name('users.update_language');
            Route::get('/users/status/{id}/{status}', 'status')->name('users.status');
            Route::get('/users/rating/{id}', 'rating')->name('users.rating');
            Route::get('/users/{id}/{approve}', 'approve')->name('users.approve');
            Route::get('/users/phoneapprove/{id}/{phoneapprove}', 'phoneapprove')->name('users.phoneapprove');
            Route::get('/users/emailapprove/{id}/{emailapprove}', 'emailapprove')->name('users.emailapprove');
            // Route::get('/users/consultant/', 'consultant')->name('users.consultant');
            Route::post('/users/download', 'export')->name('users.download');
        });
        Route::resource('/users', UserController::class);
        
        Route::controller(ConsultantController::class)->group(function () {
            Route::get('/consultants/{id}/{status}', 'status')->name('consultants.status');

            
        });
        Route::resource('/consultants', ConsultantController::class);

        
        Route::controller(AdvisorieController::class)->group(function () {
            Route::get('/advisorys/status/{id}/{status}', 'status')->name('advisorys.status');
        });


        Route::resource('/advisorys', AdvisorieController::class); 


        Route::controller(SetAvailablityController::class)->group(function () {
            Route::get('/battles/status/{id}/{status}', 'status')->name('battles.status');
            Route::get('/battles/{id}/', 'index')->name('battles.index');
        });
        Route::resource('/battles', SetAvailablityController::class);

    

        // categorys

        Route::controller(CategoryController::class)->group(function () 
        {
            Route::get('/categorys/status/{id}/{status}', 'status')->name('categorys.status');
            Route::get('/categorys/destroy/{cat_id}/', 'destroy')->name('categorys.destroy');
        });
        Route::resource('/categorys', CategoryController::class); 

        //subcategorys
        Route::controller(SubController::class)->group(function () {
            Route::get('/subcategorys/status/{id}/{status}', 'status')->name('subcategorys.status');
            Route::get('/subcategorys/destroy/{sub_id}/', 'destroy')->name('subcategorys.destroy');
        });
        Route::resource('/subcategorys', SubController::class);

        // vehical shop

        Route::controller(VehicalShopController::class)->group(function () {
            Route::get('/vehicalshops/status/{id}/{status}', 'status')->name('vehicalshops.status');
            Route::get('/vehicalshops/destroy/{id}/', 'destroy')->name('vehicalshops.destroy');
        });
        Route::resource('/vehicalshops',VehicalShopController::class);

         // vehical service

        Route::controller(VehicalServiceController::class)->group(function () {
            Route::get('/vehicalservices/status/{id}/{status}', 'status')->name('vehicalservices.status');
            Route::get('/vehicalservices/destroy/{id}/', 'destroy')->name('vehicalservices.destroy');
        });
        Route::resource('/vehicalservices',VehicalServiceController::class);
        
        // vehical service worker

        Route::controller(VehicalServiceworkerController::class)->group(function () {
            Route::get('/serviceworkers/status/{id}/{status}', 'status')->name('serviceworkers.status');
            Route::get('/serviceworkers/destroy/{id}/', 'destroy')->name('serviceworkers.destroy');
        });
        Route::resource('/serviceworkers',VehicalServiceworkerController::class);
        
        // vehical category type

        Route::controller(VehicalCategoryController::class)->group(function () {
            Route::get('/vehicaltypes/status/{id}/{status}', 'status')->name('vehicaltypes.status');
            Route::get('/vehicaltypes/destroy/{id}/', 'destroy')->name('vehicaltypes.destroy');
        });
        Route::resource('/vehicaltypes',VehicalCategoryController::class);

        // vehical employee detail 

        Route::controller(VehicalEmployeeController::class)->group(function () {
            Route::get('/vehicalemployees/status/{id}/{status}', 'status')->name('vehicalemployee.status');
            Route::get('/vehicalemployees/destroy/{id}/', 'destroy')->name('vehicalemployee.destroy');
        });
        Route::resource('/vehicalemployees',VehicalEmployeeController::class);

        // customer deatil

        Route::controller(CustomerDetailsController::class)->group(function () {
            Route::get('/customerdetails/status/{id}/{status}', 'status')->name('customerdetails.status');
            Route::get('/customerdetails/destroy/{id}/', 'destroy')->name('customerdetails.destroy');
        });
        Route::resource('/customerdetails',CustomerDetailsController::class);

        // shop employee

        Route::controller(ShopEmployeeController::class)->group(function () {
            Route::get('/shopemployees/status/{id}/{status}', 'status')->name('shopemployees.status');
            Route::get('/shopemployees/destroy/{id}/', 'destroy')->name('shopemployees.destroy');
        });
        Route::resource('/shopemployees',ShopEmployeeController::class);

        // care 

        Route::controller(CareController::class)->group(function () {
            Route::get('/cares/status/{id}/{status}', 'status')->name('cares.status');
            Route::get('/cares/destroy/{id}/', 'destroy')->name('cares.destroy');
        });
        Route::resource('/cares',CareController::class);

        // feedback

        Route::controller(FeedbackController::class)->group(function () {
            Route::get('/feedbacks/status/{id}/{status}', 'status')->name('feedbacks.status');
            Route::get('/feedbacks/destroy/{id}/', 'destroy')->name('feedbacks.destroy');
        });
        Route::resource('/feedbacks',FeedbackController::class);

        // key unclock

        Route::controller(KeyunlockController::class)->group(function () {
            Route::get('/keyunlocks/status/{id}/{status}','status')->name('keyunlocks.status');
            Route::get('/keyunlocks/destroy/{id}/','destroy')->name('keyunlocks.destroy');
        });
        Route::resource('/keyunlocks',KeyunlockController::class);

        // twing

        Route::controller(towingController::class)->group(function () {
            Route::get('/towings/status/{id}/{status}','status')->name('towings.status');
            Route::get('/towings/destroy/{id}/','destroy')->name('towings.destroy');
        });
        Route::resource('/towings',towingController::class);

        //Setting manager
        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings/general', 'edit_general')->name('settings.edit_general');
            Route::post('/settings/general', 'update_general')->name('settings.update_general');
        });
        
    });

});
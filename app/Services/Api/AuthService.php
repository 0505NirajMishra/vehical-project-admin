<?php

namespace App\Services\Api;

use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Models\User;
use App\Models\VehicalCategory;
use App\Models\VehicalEmployee;
use App\Models\Feedback;
use App\Models\CustomerDetail;
use App\Models\shopemployee;
use App\Models\Keyunlock;
use App\Models\Towing;
use App\Models\Care;
use App\Models\Rating;
use App\Models\VehicalDetail;
use App\Models\Addservice;
use App\Models\flattyre;
use App\Models\flatBattery;
use App\Models\PetrolDesiel;
use App\Models\shopregistration;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewUserNotify;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\RatingService;
use App\Services\ReviewService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URl;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class AuthService
{
    
    // login

    public static function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "You don't have an account with us, Please create your account with us and then login.",
                    'type' => 'unauthorized',
                ],
                200
            );
        }

        $credentials = $request->only(['email','password']);
        $credentials['status'] = 0;
        $token = auth('api')->attempt($credentials, ['exp' => Carbon::now()->addDays(60)->timestamp]);

        if (!$token) {
            if ($user ->status == 1) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Your account has been deactivated by admin. Please contact to Support Team.',
                        'type' => 'unauthorized',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Oops!, You have provide incorrect credentials.',
                        'type' => 'unauthorized',
                    ],
                    200
                );
            }
        }
    
        $user = JWTAuth::setToken($token)->toUser();

        if ($user->status == 0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'login successfully',
                    'token' => $token,
                    'data' => $user
                ],
                200
            );
        } else {

            return response()->json(
                [
                    'status' => false,
                    'message' => 'Deactive user',
                    'type' => 'unauthorized',
                ],
                200
            );
        }
    }

    // registration

    public static function register(Request $request)
    {
        $is_register = false;      
        $user = User::where('email',$request->email)->first();
        
        if ($user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'You have an account, Please login with same credentials.',
                    'type' => 'unauthorized',
                ],
                200
            );
        } else {
            $is_register = true;
            $input = array_merge(
                $request->except(['_token']),
                [
                    'customer_name' => $request->customer_name,
                    'email' => $request->email,
                    'customer_mobile' => $request->customer_mobile,
                    'password' => Hash::make($request->password),
                    'customer_cpassword' => Hash::make($request->customer_cpassword),
                    'user_type' => $request->user_type,
                    'fcm_token' => $request->fcm_token,
                    'status' => 0,
                ]
            );

            $user = UserService::create($input); 

            $user->assignRole($request->role);

            $token = auth('api')->login($user, ['exp' => Carbon::now()->addDays(120)->timestamp]);

            if (!$token) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'unauthorized',
                        'type' => 'unauthorized',
                    ],
                    200
                );
            }

            $user = JWTAuth::setToken($token)->toUser();
         
            if ($user->status == 0) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Register is successfully',
                        'is_register' => $is_register,
                        'token' => $token,
                        'data' => $user
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Deactive user',
                        'type' => 'unauthorized',
                    ],
                    200
                );
            }
        }
    }

    // add keyunlock

    public static function addkeyunlock(Request $request){

        $input = 
        [
            'vehical_type' => $request->vehical_type,
            'vehical_registration_no' => $request->vehical_registration_no,
            'service_location' => $request->service_location,
            'service_longitude' => $request->service_longitude,
            'service_latitude' => $request->service_latitude,
            'description' => $request->description,
            'vehical_photo' => $request->vehical_photo,
        ];


        if(!empty($request->vehical_photo))
        {
            $image=$request->file('vehical_photo'); 
            $filename = time().$image->getClientOriginalName();
            $destinationPath = public_path('/vehical/image/');
            $image->move($destinationPath, $filename); 
            $input['vehical_photo']=$filename;
        }

        $doctor = Keyunlock::create($input);

        if ($doctor) {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
                    );
                 } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
                );
        }
    }  

    // get flat Tyres List 

    public static function getflattyrelist(){

                    $users = DB::table('flattyres')
                    ->select(
                        'flattyres.*',
                        'users.customer_name',
                        'users.customer_mobile',
                        'addservices.service_logo',
                        )
                     ->join('users','users.id','=','flattyres.user_id')
                     ->join('addservices','addservices.service_id','=','flattyres.service_id')
                     ->get();
                        

                     if(count($users)>0) 
                     {
                         return response()->json(
                             [
                                 'status' => true,
                                 'message' => 'Data Find successfully',
                                 'data' => $users
                             ],
                             200
                         );
                     } else {
                         return response()->json(
                             [
                                 'status' => false,
                                 'message' => 'Data not Found',
                                 'data' =>[],
                             ],
                             200
                         );
                     }
            
    }

    // user list using flatbattery table 


    public static function changeuserstatus()
    {

        $users = DB::table('users')
        ->select(
            'users.*',
            'users.customer_name',
            'users.email',
            'users.customer_mobile',
            'users.status',
            'users.user_type',
            )
         ->join('flatbatterys','users.id','=','flatbatterys.user_id')
         ->first();
            

         if($users) 
         {
             return response()->json(
                 [
                     'status' => true,
                     'message' => 'Data Find successfully',
                     'data' => $users
                 ],
                 200
             );
         } else {
             return response()->json(
                 [
                     'status' => false,
                     'message' => 'Data not Found',
                     'data' =>[],
                 ],
                 200
             );
         }

    }

    // get Flat Battery List

    public static function getFlatBatteryList(){
                  
        $users = DB::table('flatbatterys')
        ->select(
            'flatbatterys.*',
            'users.customer_name',
            'users.customer_mobile',
            'addservices.service_logo',
            )
         ->join('users','users.id','=','flatbatterys.user_id')
         ->join('addservices','addservices.service_id','=','flatbatterys.service_id')
         ->get();
         


         if(count($users)>0) 
         {
             return response()->json(
                 [
                     'status' => true,
                     'message' => 'Data Find successfully',
                     'data' => $users
                 ],
                 200
             );
         } else {
             return response()->json(
                 [
                     'status' => false,
                     'message' => 'Data not Found',
                     'data' =>[],
                 ],
                 200
             );
         }
    }

    // get Petrol Desiel List

    public static function getPetrolDesielList(){
                  
        $users = DB::table('petroldesiels')
        ->select(
            'petroldesiels.*',
            'users.customer_name',
            'users.customer_mobile',
            'addservices.service_logo',
            )
         ->join('users','users.id','=','petroldesiels.user_id')
         ->join('addservices','addservices.service_id','=','petroldesiels.service_id')
         ->get();
         
         if(count($users)>0) 
         {
             return response()->json(
                 [
                     'status' => true,
                     'message' => 'Data Find successfully',
                     'data' => $users
                 ],
                 200
             );
         } else {
             return response()->json(
                 [
                     'status' => false,
                     'message' => 'Data not Found',
                     'data' =>[],
                 ],
                 200
             );
         }
    }

    // get key unlock list 

    public static function getkeyunlockList(){

        $users = DB::table('keyunlocks')
        ->select(
            'keyunlocks.*',
            'users.customer_name',
            'users.customer_mobile',
            'addservices.service_logo',
            )
         ->join('users','users.id','=','keyunlocks.user_id')
         ->join('addservices','addservices.service_id','=','keyunlocks.service_id')
         ->get();
         
         if(count($users)>0) 
         {
             return response()->json(
                 [
                     'status' => true,
                     'message' => 'Data Find successfully',
                     'data' => $users
                 ],
                 200
             );
         } else {
             return response()->json(
                 [
                     'status' => false,
                     'message' => 'Data not Found',
                     'data' =>[],
                 ],
                 200
             );
         }
    }
    
    // get towing List

    public static function gettowingList(){

        $users = DB::table('towings')
        ->select(
            'towings.*',
            'users.customer_name',
            'users.customer_mobile',
            'addservices.service_logo',
            )
         ->join('users','users.id','=','towings.user_id')
         ->join('addservices','addservices.service_id','=','towings.service_id')
         ->get();
         
         if(count($users)>0) 
         {
             return response()->json(
                 [
                     'status' => true,
                     'message' => 'Data Find successfully',
                     'data' => $users
                 ],
                 200
             );
         } else {
             return response()->json(
                 [
                     'status' => false,
                     'message' => 'Data not Found',
                     'data' =>[],
                 ],
                 200
             );
         }
    }

    // add towing

    public static function addtowing(Request $request){

        $input = 
        [
            'vehical_type' => $request->vehical_type,
            'vehical_registration_no' => $request->vehical_registration_no,
            'service_location' => $request->service_location,
            'service_longitude' => $request->service_longitude,
            'service_latitude' => $request->service_latitude,
            'description' => $request->description,
            'vehical_photo' => $request->vehical_photo,
            'picanddroaddress' => $request->picanddroaddress,
        ];


        if(!empty($request->vehical_photo))
        {
            $image=$request->file('vehical_photo'); 
            $filename = time().$image->getClientOriginalName();
            $destinationPath = public_path('/vehical/image/');
            $image->move($destinationPath, $filename); 
            $input['vehical_photo']=$filename;
        }

        $doctor = Towing::create($input);

        if ($doctor) {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
                    );
                 } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
                );
                }
    }

    // add vehical type

    public static function addvehicalcategory(Request $request){
           
        $input = 
        [
            'vehical_name' => $request->vehical_name,
            'vehical_type' => $request->vehical_type,
            'vehical_logo' => $request->vehical_logo,
        ]; 
        
        $image=$request->file('vehical_logo');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/vehicalcategory/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['vehical_logo']=$filename;

        $doctor = VehicalCategory::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add service 

    public static function addservice(Request $request){
           
        $input = 
        [
            'service_name' => $request->service_name,
            'service_logo' => $request->service_logo,
        ]; 
        
        $image=$request->file('service_logo');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/service/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['service_logo']=$filename;

        $doctor = Addservice::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add flat tyre

    public static function addflattyre(Request $request){
           
        $input = 
        [
            'vehical_type' => $request->vehical_type,
            'tube_tyre' => $request->tube_tyre,
            'tyre_width' => $request->tyre_width,
            'tyre_wheel_size' => $request->tyre_wheel_size,
            'tyre_speed_rating' => $request->tyre_speed_rating,
            'vehical_registration_no' => $request->vehical_registration_no,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'description' => $request->description,
        ]; 
        
        $image=$request->file('tyresize_image');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['tyresize_image']=$filename;
        $doctor = flattyre::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add flat battery

    public static function addflatbattery(Request $request){
           
        $input = 
        [
            'vehical_type' => $request->vehical_type,
            'vehical_registration_no' => $request->vehical_registration_no,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'description' => $request->description,
        ]; 
        
        $image=$request->file('battery_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['battery_photo']=$filename;


        $image1=$request->file('vehical_image');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehicalcategory/image/');
        $image1->move($destinationPath1, $filename1);
        $input['vehical_image']=$filename1;


        $doctor = flatBattery::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add petrol/desiel

    public static function addpetroldesiel(Request $request){
           
        $input = 
        [
            'vehical_type' => $request->vehical_type,
            'fuel_type' => $request->fuel_type,
            'fuel_quantity' => $request->fuel_quantity,
            'vehical_registration_no' => $request->vehical_registration_no,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'description' => $request->description,
        ]; 
        
        $image1=$request->file('vehical_image');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehicalcategory/image/');
        $image1->move($destinationPath1, $filename1);
        $input['vehical_image']=$filename1;

        $doctor = PetrolDesiel::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }

    }

    // add vehical detail 

    public static function addvehicaldetail(Request $request){

        $input = 
        [
            'vehical_photo' => $request->vehical_photo,
            'vehical_type' => $request->vehical_type,
            'vehical_company_name' => $request->vehical_company_name,
            'vehical_name' => $request->vehical_name,
            'vehical_registration_no' => $request->vehical_registration_no,
        ]; 
        
        $image=$request->file('vehical_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_photo']=$filename;

        $doctor = VehicalDetail::create($input);

        if($doctor) 
        {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Data Insert successfully',
                        'data' => $doctor
                    ],
                    200
                );
            } 
            else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // get vehical type

    public static function getaddvehical(){
           
        $status = DB::table('vehicalcategorys')->get();
    
        if (count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    } 

    // delete vehical type

    public static function deletevehical($id){ 

        $result=DB::table('vehicalcategorys')->where('vehical_catgeory_id',$id)->delete();
       
        if($result) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Delete successfully',
                    'data' => $result
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    
    }

    // update vehical type

    public static function updatevehical(Request $request,$id){
            
        $input = 
        [
            'vehical_type_name' => $request->vehical_type_name,
            'vehical_logo' => $request->vehical_logo,
        ]; 
        
        $image=$request->file('vehical_logo');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/vehicalcategory/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['vehical_logo']=$filename;

        $updatedata = DB::table('vehicalcategorys')->where('vehical_catgeory_id',$id)->update($input);
        
        if ($updatedata) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Update successfully',
                    'data' => $updatedata
                ],
                200
                    );
                 } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Updated',
                    'data' =>[],
                ],
                200
                );
        }
    } 

    // get feedback

    public static function getfeedback(){
           
        $status = DB::table('feedbacks')->get();
    
        if(count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    } 

    // add feedback

    public static function addfeedback(Request $request){
           
        $input = 
        [
            'booking_date_time'=>$request->booking_date_time,
            'service_type'=>$request->service_type,
            'service_status'=>$request->service_status,
            'vehical_type'=>$request->vehical_type,
            'tyre_type'=>$request->tyre_type,
            'cust_detail'=>$request->cust_detail,
            'shop_detail'=>$request->shop_detail,
            'calling_status'=>$request->calling_status,
            'description'=>$request->description,
        ]; 
        
        $doctor = Feedback::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
        } 
        else 
        {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }
    
    // get customer detail

    public static function customerdetail(){
           
        $status = DB::table('customerdetails')->get();
    
        if(count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add customerdetail 

    public static function addcustomerdetail(Request $request){
           
        $input = 
        [
            'shop_address'=>$request->shop_address,
            'customer_name'=>$request->customer_name,
            'booking_date_time'=>$request->booking_date_time,
            'location'=>$request->location,
            'servicetype'=>$request->servicetype,
            'tyre_type'=>$request->tyre_type,
            'vehical_type'=>$request->vehical_type
        ]; 
        
        $doctor = CustomerDetail::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
        } 
        else 
        {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // get shop employee

    public static function getshopemployee(){
           
        $status = DB::table('shopemployees')->get();
    
        if(count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // add shop employee

    public static function addshopemployee(Request $request){
           
        $input = 
        [
            'booking_date_time' => $request->booking_date_time,
            'location' => $request->location,
            'servicetype' => $request->servicetype,
            'tyre_type' => $request->tyre_type,
            'vehical_type' => $request->vehical_type,
            'service_status' => $request->service_status,
        ]; 
              
        $doctor = shopemployee::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
        } 
        else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // shop registration 

    public static function shopregistration(Request $request){
           
        $input = 
        [
            'company_name' => $request->company_name,
            'gst_no' => $request->gst_no,
            'owner_name' => $request->owner_name,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'year_of_exper' => $request->year_of_exper,
            'about_you' => $request->about_you,
            'password' => $request->password,
            'c_password' => $request->c_password,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]; 
        
        $image=$request->file('work_place_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehicalcategory/image/');
        $image->move($destinationPath, $filename);
        $input['work_place_photo']=$filename;

        $image1=$request->file('profile_image');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehicalcategory/image/');
        $image1->move($destinationPath1, $filename1);
        $input['profile_image']=$filename1;

        $shopregistration = shopregistration::create($input);

        if($shopregistration) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $shopregistration
                ],
                200
            );
        } 
        else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }

    }

    // get vehical employee

    public static function getemployee(){
           
        $status = DB::table('vehicalemployees')->get();
    
        if (count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // get service

    public static function getservice(){
           
        $status = DB::table('addservices')->get();
    
        if (count($status)>0) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Find successfully',
                    'data' => $status
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // delete vehical employee

    public static function deleteemployee($id){ 

        $result=DB::table('vehicalemployees')->where('vehical_employee_id',$id)->delete();
       
        if($result) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Delete successfully',
                    'data' => $result
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Found',
                    'data' =>[],
                ],
                200
            );
        }
    
    }

    // update vehical employee

    public static function updateemployee(Request $request,$id){
            
        $input = 
        [
            'vehical_service_type_exprt' => $request->vehical_service_type_exprt,
            'vehical_employee_name' => $request->vehical_employee_name,
            'vehical_company_name' => $request->vehical_company_name,
            'vehical_mobile' => $request->vehical_mobile,
        ]; 
        
        $image=$request->file('vehical_employee_profile');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/vehicalcategory/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['vehical_employee_profile']=$filename;

        $updatedata = DB::table('vehicalemployees')->where('vehical_employee_id',$id)->update($input);
        
        if ($updatedata) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Update successfully',
                    'data' => $updatedata
                ],
                200
                    );
                 } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Updated',
                    'data' =>[],
                ],
                200
                );
        }
    }

    // add vehical employee

    public static function addemployee(Request $request){
           
        $input = 
        [
            'vehical_service_type_exprt' => $request->vehical_service_type_exprt,
            'vehical_employee_name' => $request->vehical_employee_name,
            'vehical_employee_profile' => $request->vehical_employee_profile,
            'vehical_company_name' => $request->vehical_company_name,
            'vehical_mobile' => $request->vehical_mobile,
        ]; 
              
        $doctor = VehicalEmployee::create($input);

        if($doctor) 
        {
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Data Insert successfully',
                    'data' => $doctor
                ],
                200
            );
        } 
        else {
                return response()->json(
                [
                    'status' => false,
                    'message' => 'Data not Inserted',
                    'data' =>[],
                ],
                200
            );
        }
    }

    // user logout 
    
    public static function logout(Request $request)
    {
        self::getAuthUser();
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    // get auth user

    public static function getAuthUser()
    {
        return JWTAuth::parseToken()->authenticate();
    }
       
    
}
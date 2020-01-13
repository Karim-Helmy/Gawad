<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
class UserApi extends Controller
{



      public function login(Request $request)
        {
            $rules =   [
                   
                    'username'    => 'required',
                    'password' => 'required|min:5',
                    ];
            $validator = Validator::make(request()->all(), $rules);
            if ($validator->fails()) 
            {
                
                return response(['status' => false, 'messages' => $validator->messages(),'data'=>null]);
            }
            else
            {
                    if ( auth()->attempt(['username' => request ('username') ,'password' => request ('password')]))
                    {
                      $token  = str_random(60).time();
                      User::where('username', $request->username)->update(['api_token' => $token]);
                      $user   =  User::where('username', $request->username)->first();
                      
                      if( $request->lang == "en"){
                            return response(['status' => true,'messages' => ["Login Successfully"], "data"=>['user'=>$user,'api_token'=>$user->api_token] ]);
                      }else {
                            return response(['status' => true,'messages' => ["تم تسجيل الدخول بنجاح"], "data"=>['user'=>$user,'api_token'=>$user->api_token] ]);
                      }
                    }
                    else { 
                      if( $request->lang == "en"){
                          return response(['status' => false,  'messages' => ["Error! Wrong Username or Password"], 'data' => null]);
                      }else {
                          return response(['status' => false,  'messages' => ["اسم المستخدم او الرقم السرى غير صحيح"], 'data' => null]);
                      }
                    }
            }
        }


    public function check(Request $request)
    {
        $user            = User::where('api_token', $request->api_token)->first();

        return response(['status' => true,'messages' => [trans('admin.checkmessage')],'data' => $user]);
    }

    
          public function logout(Request $request)
           {
            $user            = User::where('api_token', $request->api_token)->first();
            $user->api_token = null;
            $user->save();
            return response(['status' => true,'messages' => [trans('admin.logoutmessage')],'data' => null]);
           }
    
    
    
    

}

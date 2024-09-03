<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use Laravel\Socialite\Facades\Socialite;

class googleAuth extends Controller
{
    #initiate the google auth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    #google authentication process
    public function handleGoogleCallback(){
        
        $user = Socialite::driver('google')->stateless()->user();
 
        // OAuth 2.0 providers...
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;
        
     
        #check if email user exist
        $checkUser=UsersTable::where('email',$user->getEmail())->first();
        if($checkUser){
            
              Auth::guard('web')->loginUsingId($checkUser->id);
              #checking auth user
              $auth_user=auth()->guard('web')->user()->user_type;
              if($auth_user==='student'){

                 return redirect('/dashboard');
              }
              elseif($auth_user==='proguide'){

                  return redirect('/proguide/dashboard');
              }
              else{
                  //employer
              }
        }
        else{
            
             
            #insert new user
            $newuser=UsersTables::create([
                'full_name' => $user->user['given_name']."".$user->user['family_name'],
                'email' => $user->getEmail(),
                'profile_image'=>$user->getAvatar(),
                'country_id' => '0',
                'email_verified_at'=>Carbon::now(),
                'user_type' => '',
                'password' => '',
                'phone_number'=>'',
                'profile_image' => '',
                'referal_code' => "PROJ" .  Str::upper(Str::random(6)),
                'referal_earnings'=>'0',
                'university' => '',
                'fcm_token'=>''
            ]);

                
                
            if($newuser){
                return redirect('/register/2/'.base64_encode($newuser->id));
            }

        }
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;


class SocialController extends Controller
{
    public function GoogleRedirect()
    {
     return Socialite::driver('google')->redirect();
    }
    public function FacebookRedirect()
    {
     return Socialite::driver('facebook')->redirect();
    }
    public function FacebookCallback()
    {
        try
        {
            $userSocial =   Socialite::driver('facebook')->user();
            $user=User::where('email',$userSocial->getEmail())->First();
          
            if(!$user)
            {
                $new_user=User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'google_id' => $userSocial->getId(),
                'google' => 1,
                'password' => Hash::make('defaultpassword'),
                ]);
                Auth::guard('user')->login($new_user);
                    return redirect()->route('home');
                
            }
            else
            {
                Auth::guard('user')->login($user);
                return redirect()->route('home');
            }

        }
        catch(\Throwable $e)
        {
            dd($e->getMessage());
        }
        
    }
    public function GoogleCallback()
    {
        try
        {
            $userSocial =   Socialite::driver('google')->user();
            $user=User::where('email',$userSocial->getEmail())->First();
          
            if(!$user)
            {
                $new_user=User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'google_id' => $userSocial->getId(),
                'google' => 1,
                'password' => Hash::make('defaultpassword'),
                ]);
                Auth::guard('user')->login($new_user);
                    return redirect()->route('home');
                
            }
            else
            {
                Auth::guard('user')->login($user);
                return redirect()->route('home');
            }

        }
        catch(\Throwable $e)
        {
            dd($e->getMessage());
        }
        
        
    }
}

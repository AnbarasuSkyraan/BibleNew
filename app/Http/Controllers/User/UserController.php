<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Response;
use Laravel\Passport\Passport;  
class UserController extends Controller
{
    public function UserLoginSubmit(Request $request)
    {
      
      $input=$request->all();
      $validation=Validator::make($input,[
        'email' => 'required|email',
        'password' => 'required',
      ]);
      if($validation->fails())
      {
        return response()->json(['result' => 0,'error' => $validation->errors()->all()],422);
      }
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
      {
        $user=auth()->guard('user');
      
        $token=$user->createToken('apitoken')->accesstoken;
        return response()->json(['token' => $token,'users' => $user]);
      }
      else
      {
        return response()->json(['error' => 'UnAuthendicated User']);
      }
    }
    }

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Froiden\RestAPI\ApiController;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use Froiden\RestAPI\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function login(LoginRequest $request)
    {
//        $email = $request->get('email');
//        $password = $request->get('password');
//        $rememberMe = $request->get('remember_me');
//
//        $token = User::check($email, $password, $rememberMe);
//
//        if(!$token)
//        {
//            $user = User::where('username', $email)->first();
//
//            if(!$user)
//            {
//                $user = User::where('email', $email)->first();
//            }
//        }

    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = bcrypt($request->password);
        $user->save();

        $userToken = User::first();
        $token = JWTAuth::fromUser($userToken);

        return ApiResponse::make('logged in successfully', [
            'token' => $token,
            'user' => $user
        ]);
    }

}

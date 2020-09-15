<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
   

    public function verify(Request $request)
    {
        $code = $request->code;
        $mobile = $request->phone;
        $activationCode_OBJ = ActivationCode::where('v_code', $code)->where('mobile', $mobile)->first();
        if ($activationCode_OBJ) {

            // check member 
            if ($member = Member::where('phone', $mobile)->first()) {
                $token = JWTAuth::fromUser($member);
                return response()->json([
                    'code' => 201,
                    'data' => $token,
                    'error' => '',
                ], 200);
            } else {
                $member = new Member;
                $member->phone = $request->phone;
                if ($member->save()) {
                    $token = JWTAuth::fromUser($member);
                    return response()->json([
                        'code' => 201,
                        'data' => $token,
                        'error' => '',
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'کد وارد شده اشتباه است',
            ], 200);
        }
    }

    public function register(Request $request)
    {

      if ($member = User::where('email', $request->email)->first()) {

         return response()->json([
                'code' => 400,
                'message' => 'email already exist',
            ], 400);
      }
        $member = new User;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        
        if ($member->save()) {
            $token = JWTAuth::fromUser($member);
            return response()->json([
                'code' => 200,
                'data' => $token,
                'error' => '',
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'error in register',
            ], 401);
        }
    }


    public function login(Request $request)
    {
      
        if ($member = User::where('email', $request->email)->first()) {
            if (Hash::check($request->password, $member->password)) {
                $token = JWTAuth::fromUser($member);
                return response()->json([
                    'code' => $token,
                    'error' => '',
                ], 200);
            } else {
                return response()->json(['error' => 'Password Incorrect'], 401);
            }
        } else {
            return response()->json(
                ['message' => 'User Not Found'],
                401
            );
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->toArray());
        

        return response()->json([
            'token' => $user->createToken('API Token')->accessToken,
        ], 200);
    }


    //Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        if (!$user = User::where('email', $request->email)->first()) {
            return response()->json(['errors' => 'User account not found!'], 404);
        }

        if (!auth()->attempt($request->all())) {
            return response()->json(['errors' => 'invalid_credentials'], 401);
        }

        $user_login_token= $user->createToken('name')->accessToken;

        dd($user_login_token);
        
        //now return this token on success login attempt
        return response()->json(['token' => $user_login_token], 200);
    }
}

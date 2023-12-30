<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return Response(['message' => $validator->errors()],401);
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);

        return response([], 201);
    }

    public function login(LoginRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:4',
            'password' => 'required|min:6',
        ]);
        
        if($validator->fails()){
            return Response(['message' => $validator->errors()],401);
        }

        $user = User::whereName($request->name)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Invalid Credentials'
            ], 422);
        }

        $token = $user->createToken('med_api')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
            'message' => 'login successful',
            
        ], 200);
    }
}

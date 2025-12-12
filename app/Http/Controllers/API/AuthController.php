<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'email'    => ['required', 'email','max:255'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name'     =>$validate['name'],
            'password' =>Hash::make($validate['password']),
        ]);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'data' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'token' => $token,
            ]
        ]);
    }
}

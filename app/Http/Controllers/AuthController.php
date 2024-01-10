<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller{
    // ユーザ登録する処理
    public function register(Request $request){
        //Requestから値を受けとる 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            // 'tel' => 'nullable',
            // 'affiliation' => 'nullable|string',
            'birth' => 'nullable|date',
            'registration_date' => 'nullable|date',
        ]);
        
        // モデルでユーザ情報をデータベースに登録
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'tel' => 12345,
            'affiliation' => 'affiliation',
            'birth' => $validatedData['birth'],
            'registration_date' => $validatedData['registration_date'],
            'password' => Hash::make($validatedData['password']),
        ]);
        
        
        $token = $user->createToken('auth_token')->plainTextToken;
        $user_id = $user->id;

       
        return response($user_id, 200);
    }
    public function login(Request $request)    {
        if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
        'message' => 'Invalid login details'
                ], 401);
        }
    
        $user = User::where('email', $request['email'])->firstOrFail();
        
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user_id' =>  $user->id,
            'user_name' =>  $user->name,
        ]);
    } 
    
}

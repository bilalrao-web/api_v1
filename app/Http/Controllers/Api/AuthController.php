<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponses;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ApiLoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(ApiLoginUserRequest $request){
         if(!Auth::attempt($request->only('email','password'))){
            return $this->error('Invalid User',401);
         }
         $user = User::firstWhere('email',$request->email);
         return $this->ok('User logged in successfully',[
            'token' => $user->createToken(
                'API Token for' . $user->email,
                ['*'],
                now()->addMonth())->plainTextToken
         ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return $this->ok('User logged out successfully');
    }
    public function register(){
        return $this->ok('register');
    }


}

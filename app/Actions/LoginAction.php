<?php

namespace App\Actions;

use App\Http\Resources\UserResource;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginAction{
    use ResponseTrait;

    public function handle(array $data)
    {

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){ 
            $user = Auth::user(); 
            $token =  $user->createToken('MyApp')->plainTextToken; 
            
            return $this->success('Login Successful', ['token' => $token, 'user_details' => new UserResource($user)]);
        } 
        else{ 
            return $this->error('Wrong credentials');
        } 
       
        return $this->success('A link have been sent to your email, click the link to proceed');
    }
}
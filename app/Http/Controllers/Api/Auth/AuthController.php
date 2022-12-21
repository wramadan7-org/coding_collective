<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends BaseController
{
    /**
     * Register user
     * 
     * @param \App\Http\Requests\Auth\RegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) {
        $request['password'] = bcrypt($request['password']);

        $user = new User();
        $user->user_name = $request['name'];
        $user->user_email = $request['email'];
        $user->user_password = $request['password'];
        $user->user_birthday = '2000-01-01';
        $user->user_phone = '081000000';
        $user->user_last_position = 'default';
        $user->user_applied_position = '';
        $user->role_id = $request['role_id'];
        $user->save();
        
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->user_name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request) {
        // dd($request);
        if(Auth::attempt(['user_email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->user_name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return  $this->success('', ['Token' => $user->createToken($request->email)->plainTextToken]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function getLoginPage(){

        return view("login");
    }

    public function getRegisterPage(){

        return view("register");
    }


    public function signIn(LoginRequest $request){

        $user=User::where("email",$request->email)->first();

        if($user === null){
            return redirect()->back()->with(['message' => "user not"]);
        }

        elseif(Hash::check($request->password,$user->password)){
            Auth::login($user);
            return redirect()->route("home");
        }

        else{

            return redirect()->back()->with(['message'=>"password in correct"]);
        }


    }

    public function signUp(UserRequest $request){


        $user=User::where("email",$request->email)->first();

        if($user !=null){
            return redirect()->route("login");
        }
        else{
            $user= new User();

            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->phone=$request->phone;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route("login");
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

}

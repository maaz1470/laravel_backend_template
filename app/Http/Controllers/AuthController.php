<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Hash;
class AuthController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

    public function register(){
        return view('backend.auth.register');
    }

    public function registration(Request $request){
        $validator = Validator::make($request->all(),[
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:admins,email',
            'password'  => 'required|string'
        ]);

        if($validator->fails()){
            return Response()->json([
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ]);
        }

        $admins = Admin::all();

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if($admins->count() == 0){
            $admin->status = 1;
            $admin->verification = 1;
            $admin->role = 1;
        }else{
            $admin->status = 0;
            $admin->verification = 0;
            $admin->role = 0;
        }
        if($admin->save()){
            return Response()->json([
                'status'    => 200,
                'message'   => 'User Registration Successfully'
            ]);
        }else{
            return Response()->json([
                'status'    => 402,
                'message'   => 'Something went wrong. Please try again.'
            ]);
        }
        
    }
}

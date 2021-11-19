<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
           return 0;
    }
    public function login(Request $request){
        $rules = [
            'username'   => 'required',
            'password'   => 'required',
        
        ];

        $messages = [
            'username.required'      => 'Username wajib di isi',
            'username.unique'      => 'Username Sudah Terdaftar',
            'password.required'        => 'Password wajib di isi',
           
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
        }
        $model = $request->all();
        $data = User::select('username','password')->where('username',$model['username'])->first();

        if (Hash::check($model['password'], $data->password))
            {
                return response()->json( [$data] );
            }
    }
}

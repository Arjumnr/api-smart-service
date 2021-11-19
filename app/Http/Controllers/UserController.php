<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Data User All',
            'data'    => $model,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap'   => 'required',
            'username'        => 'required|unique:users',
            'password'   => 'required',
            'no_hp'     => 'required',
        
        ];

        $messages = [
            'nama_lengkap.required'        => 'Nama Lengkap wajib di isi',
            'username.required'      => 'Username wajib di isi',
            'username.unique'      => 'Username Sudah Terdaftar',
            'password.required'        => 'Password wajib di isi',
            'no_hp.required'           => 'No hp wajib di isi',
          
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
        }

        $model = $request->all();
        $model['password'] = Hash::make($model['password']);
        $data = User::create($model);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Tambah',
            'data'    => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportsModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PilihKendaraanController extends Controller
{
    public function createPilihKendaraan(Request $request){

        
        $rules = [
            'merk_transport' => 'required'
        ];

        $messages = [
            'merk_transport.required' => 'Kendaraan Harus di Isi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
        }

       
        $model = $request->all();
        $data = TransportsModel::create($model);
        User::where('id', $model['user_id'])->update([
            'transports_id' => $data['id'],
        ]);

       
        return response()->json([
            'status' => true,
            'message' => 'Kendaraan Berhasil di Tambah',
            'data'    => $data,
        ], 201);

    }
}

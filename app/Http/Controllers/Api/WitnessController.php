<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WitnessResource;
use App\Models\Witness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WitnessController extends Controller
{
    public function index(){
        $witness = Witness::latest()->paginate(10);
        return new WitnessResource($witness);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $witness = Witness::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return new WitnessResource($witness);
    }

    public function show($id){
        $witness = Witness::find($id);
        return new WitnessResource($witness);
    }

    public function destroy($id){
        $witness = Witness::find($id);
        $witness->delete();
        return new WitnessResource($witness);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'keterangan' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $witness = Witness::find($id);
        $witness->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return new WitnessResource($witness);
    }
}

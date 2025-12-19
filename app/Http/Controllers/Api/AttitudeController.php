<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttitudeResource;
use App\Models\Attitude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttitudeController extends Controller
{
    public function index(){
        $attitude = Attitude::latest()->paginate(10);
        return new AttitudeResource($attitude);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'kategori' => 'required',
            'catatan' => 'required', 
            'status' => 'required', 
            'dilaporkan' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $attitude = Attitude::create([
            'kategori' => $request->kategori,
            'catatan' => $request->catatan, 
            'status' => $request->status, 
            'dilaporkan' => $request->dilaporkan, 
        ]);

        return new AttitudeResource($attitude);
    }

    public function show($id){
        $attitude = Attitude::find($id);
        return new AttitudeResource($attitude);
    }

    public function destroy($id){
        $attitude = Attitude::find($id);
        $attitude->delete();

        return new AttitudeResource($attitude);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'kategori' => 'required',
            'catatan' => 'required', 
            'status' => 'required', 
            'dilaporkan' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $attitude = Attitude::find($id);
        $attitude->update([
            'kategori' => $request->kategori,
            'catatan' => $request->catatan, 
            'status' => $request->status, 
            'dilaporkan' => $request->dilaporkan,
        ]);

        return new AttitudeResource($attitude);
    }
}

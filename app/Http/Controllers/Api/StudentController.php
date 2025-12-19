<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $student = Student::latest()->paginate(10);
        return new StudentResource($student);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'foto' => 'nullable',
            'nis' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'total_portofolio' => 'required', 
            'total_sertifikat' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $student = Student::create([
            'nama' => $request->nama,
            'foto' => $request->foto,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'total_portofolio' => $request->total_portofolio,
            'total_sertifikat' => $request->total_sertifikat,
        ]);

        return new StudentResource($student);
    }

    public function show($id){
        $student = Student::find($id);
        return new StudentResource($student);
    }

    public function destroy($id){
        $student= Student::find($id);
        $student->delete();

        return new StudentResource($student);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'foto' => 'nullable',
            'nis' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'total_portofolio' => 'required', 
            'total_sertifikat' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama,
            'foto' => $request->foto,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'total_portofolio' => $request->total_portofolio,
            'total_sertifikat' => $request->total_sertifikat,
        ]);

        return new StudentResource($student);
    }
}

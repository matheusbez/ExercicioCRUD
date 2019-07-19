<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class IsidoroController extends Controller
{
    public function createStudent(Request $request){
    	
    	$student = new Student;

    	$student->name = $request->name;
    	$student->registration_number = $request->registration_number;
    	$student->email = $request->email;
    	$student->phone = $request->phone;
    	$student->save();

    	return response()->success($student);
    }
    public function listStudent(){

    	return Student::all();
    }
    public function showStudent($id){

    	$student = Student::find($id);

    	if ($student) {
    		return response()->success($student);
    	} else{
    		$data = "Estudante não encontrado, verifique o id novamente";
    		return response()->error($data, 400);
    	}
    	
    }
    public function updateStudent(Request $request, $id){

    	$student = Student::findOrFail($id);

    	if ($request->name)
    		$student->name = $request->name;
    	if($student->registration_number)
    		$student->registration_number = $request->registration_number;
    	if($student->email)
    		$student->email = $request->email;
    	if ($student->phone)
    		$student->phone = $request->phone;
    	$student->save();

    	return response()->success($student);
    }
    public function deleteStudent($id){

    	Student::destroy($id);
    	return response()->json(['Estudante deletado']);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boletim;

class BoletimController extends Controller
{
    public function createBoletim(Request $request){

    	$aluno = new Boletim;

    	$aluno->nota_portugues = $request->nota_portugues;
    	$aluno->nota_ingles = $request->nota_ingles;
    	$aluno->nota_ciencias = $request->nota_ciencias;
    	$aluno->nota_mat = $request->nota_mat;
    	$aluno->student_id = $request->student_id;
    	$aluno->save();

    	return response()->succes($aluno);
    }
    public function listBoletim(Request $request){

    	return Boletim::all();
    }
    public function showBoletim(Request $id){

    	$student = Boletim::find($id);

    	if ($student) {
    		return response()->success($student);
    	} else{
    		$data = "Estudante não encontrado, verifique o id novamente";
    		return response()->error($data, 400);
    	}
    }
    public function updateBoletim(Request $request, $id){

    	$student = Boletim::findOrFail($id);
    	if ($student->nota_portugues)
    		$student->nota_portugues = $request->nota_portugues;
    	if($student->nota_ingles)
    		$student->nota_ingles = $request->nota_ingles;
    	if($student->nota_ciencias)
    		$student->nota_ciencias = $request->nota_ciencias;
    	if ($student->nota_mat)
    		$student->nota_mat = $request->nota_mat;
    	if($student->student_id)
    		$student->student_id = $request->student_id;
    	$student->save();

    	return response()->success($student);
    }
    public function deleteBoletim($id){

    	Boletim::destroy($id);
    	return response()->json(['Boletim deletado']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        // $cursos=Curso::select('id', 'name', 'category')->get();
        $cursos=Curso::paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function createCurso(){
        return view('cursos.create');
    }

    public function show($id){

        $curso = Curso::find($id);
        /**
         * Para pasar variables a la vista se hace por un array 
         * ['nombreVariable_recibeLaVista'=>$nombreVariable_EstoyPasando]
         * 
         * Si quiero pasar la variale con el mismo nombre que la recibo 
         * puedo usar compact('nombreVariable_EstoyPasando'), me devuelve 
         * un array ['nombre'=>$nombre]
         */
        // return view('cursos.show', ['lenguaje'=>$lenguaje]);
        return view('cursos.show', compact('curso'));
    }
}

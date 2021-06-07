<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return view('cursos.index');
    }

    public function createCurso(){
        return view('cursos.create');
    }

    public function show($lenguaje){
        /**
         * Para pasar variables a la vista se hace por un array 
         * ['nombreVariable_recibeLaVista'=>$nombreVariable_EstoyPasando]
         * 
         * Si quiero pasar la variale con el mismo nombre que la recibo 
         * puedo usar compact('nombreVariable_EstoyPasando'), me devuelve 
         * un array ['nombre'=>$nombre]
         */
        // return view('cursos.show', ['lenguaje'=>$lenguaje]);
        return view('cursos.show', compact('lenguaje'));
    }
}

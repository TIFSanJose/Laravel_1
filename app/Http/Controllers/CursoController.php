<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        // $cursos=Curso::select('id', 'name', 'category')->get();
        $cursos=Curso::orderBy('id', 'desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function createCurso(){
        return view('cursos.create');
    }

    public function store(Request $request){
// Validaciones
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        $curso=new Curso();
        $curso->name=$request->nombre;
        $curso->category=$request->categoria;
        $curso->descripcion=$request->descripcion;

        $curso->save();
        return redirect()->route('curso.show', $curso);
    }

    public function update(Request $request, Curso $curso){
// Validacion
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        $curso->name=$request->nombre;        
        $curso->category=$request->categoria;        
        $curso->descripcion=$request->descripcion;   
        
        $curso->save();
        return redirect()->route('curso.show', $curso);
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

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso'));
    }
}

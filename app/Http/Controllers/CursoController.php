<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        // $cursos=Curso::select('id', 'name', 'category')->get();
        $cursos=Curso::orderBy('id', 'desc')->paginate();
        return view('cursos.index', compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }

    public function store(StoreCurso $request){

        // $curso=new Curso();
        // $curso->name=$request->nombre;
        // $curso->category=$request->categoria;
        // $curso->descripcion=$request->descripcion;

        // $curso->save();

// Asignacion +iva uso del metodo Create
        // $curso=Curso::create([
        //     'name'=>$request->nombre,
        //     'category'=>$request->categoria,
        //     'descripcion'=>$request->descripcion
        // ]);

        $curso=Curso::create($request->all());

        return redirect()->route('curso.show', $curso);
    }

    public function update(StoreCurso $request, Curso $curso){

        // $curso->name=$request->name;        
        // $curso->category=$request->category;        
        // $curso->description=$request->description;   
        
        // $curso->save();

        $curso->update($request->all());

        return redirect()->route('curso.show', $curso);
    }

    public function show(Curso $curso){

        // $curso = Curso::find($curso);
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

    public function destroy(Curso $curso){
        $curso->delete();
        return redirect()->route('curso.index');
    }
}

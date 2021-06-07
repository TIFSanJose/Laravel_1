<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return "index";
    }

    public function createCurso(){
        return "aqui puedes crear un curso";
    }

    public function show($lenguaje){
        return "bienvenido al curso de $lenguaje";
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function store(){
        $corre=new ContactanosMailable();

        Mail::to('chedecime@gmail.com')->send($corre);
    
        return 'correo enviado';
    }
}

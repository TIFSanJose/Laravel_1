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

    public function store(Request $request){
        $correo=new ContactanosMailable($request->all());

        Mail::to('chedecime@gmail.com')->send($correo);
    
        return 'correo enviado';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mandar_mail()
    {
        //
        $datos= [
            "titulo"=> "Probando",
            "contenido"=>"Esto es una prueba de envio"
        ];
        //3 parametros 1 documento que le da formato a ese correo electronico(una view), 2 el array, 3 funcion que recibe una variable que especifica a quien va el correo
        Mail::send("email.emailView",$datos, function($mensaje){
            $mensaje->to("andreizaharia41@gmail.com", "Andrey")-> subject("Asunto del asdadsdMensaje"); //destinatario
        });

        return redirect("view_producto")->with('success', 'Orden realizada revisa su Correo electronico');
    }

}

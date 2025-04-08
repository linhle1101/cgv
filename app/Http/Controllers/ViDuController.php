<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViDuController extends Controller
{
    //
    function vidu1(){
        $name = "TurtleRabbit";
        return view('vidu1', ['name'=> $name]);
    }

    function vidu2() {
        return view ('vidu2');
    }

    function tinhtong(Request $request)
    {
    $so_a = $request->input("so_a");
    $so_b = $request->input("so_b");
    $ket_qua = $so_a+$so_b;
    return "Kết quả là: ".$ket_qua;
    }

}


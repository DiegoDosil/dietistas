<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaxinasController extends Controller
{
    public function envia_crear_dietista(){
    	$ok=false;
    	if (isset($_SESSION['dependencia'])) {
    		if($_SESSION['dependencia']=="0")
    			{$ok=true;}
    	}
    	if($ok){return view('/admin/creardietista');}
    	else{return view('ingresoincorrecto');}
    }
}

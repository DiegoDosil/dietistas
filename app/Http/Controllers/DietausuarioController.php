<?php

namespace App\Http\Controllers;

use App\Dietausuario;
use App\Usuario;
use App\Dieta;
use App\Alimento;
use App\Alteracion;
use App\Usuarioalteracion;
use Illuminate\Http\Request;

class DietausuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gardar=new Dietausuario;
        $erro=false;
        if(isset($request->dietista_id) && isset($request->idcliente) && isset($request->id_dieta))
            {
            $aux=Dietausuario::all();
            foreach ($aux as $du) 
                {
                if($du->cliente_id==$request->idcliente && $du->dieta_id==$request->id_dieta){$erro=true;}
                }
            if($erro){return back()->with('mensaxe',"A dieta xa estaba asignada a este cliente");}
            else
                {
                $gardar->dietista_id=$request->dietista_id;
                $gardar->cliente_id=$request->idcliente;
                $gardar->dieta_id=$request->id_dieta;
                $gardar->save();
                return back()->with('mensaxe',"Dieta asignada correctamente");
                }
            }
        else{return back()->with('mensaxe',"Non se asignou ningunha dieta");}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function asignardietas()
    {
    $dietas=Dieta::all();
    $usuarios=Usuario::all();
    $alteracions=Alteracion::all();
    $usualteracions=Usuarioalteracion::all();
    return view('/dietista/asignardietas', compact('usuarios','dietas','usualteracions','alteracions'));
    }
}

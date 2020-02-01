<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Usuario;
use Illuminate\Http\Request;

class CitaController extends Controller
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
        /*TODO: VALIDACIÓNS*/
        $cita=new Cita;
        $cita->hora=$request->hora;
        $cita->fecha=$request->fecha;
        $cita->estado=$request->estado;
        $cita->localizacion=$request->localizacion;
        $cita->observacions=$request->observacions;
        $cita->dietista_id=$request->dietista_id;
        $cita->idcliente=$request->idcliente;
        $cita->save();
        return back()->with('mensaxe',"Cita creada");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
    }
    public function consultarcitas()
    {
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/consultarcitas', compact('citas'), compact('usuarios'));
    }
    public function crearcitas()
    {
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/crearcitas', compact('citas'), compact('usuarios'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $novaData=substr($request->fecha,6)."/".substr($request->fecha, 3, 2)."/".substr($request->fecha, 0, 2);
        $cita->fecha=$novaData;
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
    public function cambiarestadocitas()
    {
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/cambiarestadocitas', compact('citas'), compact('usuarios'));
    }
    public function cambiaestadocitas(Request $request)
    {
       $novoValor=$request->estado;
       $mensaxe="";
       if($novoValor!="Pendente" && $novoValor!="Completa" && $novoValor!="Realizada")
            {
            $mensaxe="Debe seleccionar un novo estado para a cita";
            }
        else
            {
            $mensaxe="Estado cambiado a ".$novoValor;
            DB::table('citas')
            ->where('id', $request->id)
            ->update(['estado' => $novoValor]);
            }
       return back()->with('mensaxe',$mensaxe);
    }
    public function eliminarcita()
    {
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/eliminarcita', compact('citas'), compact('usuarios'));
    }
    public function eliminacita(Request $request)
    {
       $mensaxe="Cita borrada";
       $cita=DB::table('citas')->where('id', $request->id)->first();
       DB::table('citas')
            ->where('id', $request->id)
            ->delete();
       return back()->with('mensaxe',$mensaxe);
    }
    public function completarcitas()
    {
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/completarcitas', compact('citas'), compact('usuarios'));
    }
    /*public function completarcitas2()
    {
       return view('/dietista/completarcitas2');
    }*/
    public function completacitas(Request $request)
    {
       $mensaxe="Cita completada";
       $novoValor="Completa";
       DB::table('citas')
            ->where('id', $request->id)
            ->update([
                'estado' => $novoValor,
                'observacions' => $request->observacions,
                'peso' => $request->peso,
                'imc' => $request->imc,
                'pcgrasa' => $request->pcgrasa,
                'pcauga' => $request->pcauga,
                'pcmasamusc' => $request->pcmasamusc,
                'pcmedperna' => $request->pcmedperna,
                'pcmedcadera' => $request->pcmedcadera,
                'pcmedcintura' => $request->pcmedcintura,
                'pcmedpeito' => $request->pcmedpeito
            ]);
       $citas=Cita::all();
       $usuarios=Usuario::all();
       return back()->with('mensaxe',$mensaxe);
    }
public function amosarevolucion()
    {
       //$citas=DB::table('citas')->where('estado', "Completa");
      $citas = DB::table('citas')
                ->orderBy('fecha', 'asc')
                ->get();
       $usuarios=Usuario::all();
       //$citas=Cita::all();
       return view('/dietista/evolucion', compact('citas'), compact('usuarios'));
/*       $citas=Cita::all();
       $usuarios=Usuario::all();
       return view('/dietista/evolucion', compact('citas'), compact('usuarios'));*/
    }

}

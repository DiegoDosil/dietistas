<?php

namespace App\Http\Controllers;

//require_once 'BedcaClient.php';
use App\Usuario;
use App\Dieta;
use App\Dietausuario;
use App\Alimento;
use App\Alteracion;
use App\Usuarioalteracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DietaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function show(Dieta $dieta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function edit(Dieta $dieta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dieta $dieta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dieta  $dieta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dieta $dieta)
    {
        //
    }
    public function creardietas()
    {
    return view('/dietista/creardietas');
    }
    public function consultardietas()
    {
    $dietas=Dieta::all();
    $alimentos=Alimento::all();
    return view('/dietista/consultardietas', compact('dietas'), compact('alimentos'));
    }
    public function clienteconsultardietas()
    {
    $dietas=Dieta::all();
    $alimentos=Alimento::all();
    $usudietas=Dietausuario::all();
    return view('/cliente/consultardietas', compact('dietas', 'alimentos', 'usudietas'));
    }
    public function creaDieta(Request $request)
    {
    if(Dieta::where('nome', '=', $request->nomedieta)->count()>0)
        {
        return back()->with('mensaxe',"O nome da dieta xa existe");    
        }
    else
        {
        $diettemp=new Dieta;
        $diettemp->dietista_id=$request->dietista_id;
        $diettemp->nome=$request->nomedieta;
        $diettemp->finalizada=0;
        $diettemp->observacions=$request->observacions;
        $diettemp->save();
        return back()->with('mensaxe',"Dieta creada correctamente");    
        }
    }
    public function cambiarestadodietas()
    {
       $dietas=Dieta::all();
       return view('/dietista/cambiarestadodietas', compact('dietas'));
    }
    public function cambiaestadodieta(Request $request)
    {
       $novoValor=$request->estado;
       $mensaxe="";
       if($novoValor!="Completa" && $novoValor!="Incompleta")
            {
            $mensaxe="Debe seleccionar un novo estado para a dieta";
            }
        else
            {
            if($novoValor=="Completa")
                {
                $mensaxe="Estado cambiado a completa";
                DB::table('dietas')
                ->where('id', $request->id)
                ->update(['finalizada' => 1]);
                }
            else
                {
                $mensaxe="Estado cambiado a incompleta";
                DB::table('dietas')
                ->where('id', $request->id)
                ->update(['finalizada' => 0]);
                }
            }
       return back()->with('mensaxe',$mensaxe);
    }

}

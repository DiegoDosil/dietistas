<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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
        $usu=new Usuario;
        $usu->nome=$request->nome;
        $usu->email=$request->email;
        $usu->password=$request->password;
        $usu->direccion=$request->direccion;
        $usu->telefono=$request->telefono;
        $usu->dependencia=$request->dependencia;
        $usu->activado=$request->activado;
        $usu->save();
        return back()->with('mensaxe',"Usuario creado correctamente");
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
        $usu=new Usuario;
        $usu->nome=$request->nome;
        $usu->email=$request->email;
        $usu->password=md5($request->password);
        $usu->direccion=$request->direccion;
        $usu->telefono=$request->telefono;
        $usu->dependencia=$request->dependencia;
        $usu->activado=$request->activado;
        $usu->save();
        return back()->with('mensaxe',"Usuario creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
    public function login_usuario(Request $request)
    {
        $usu=new Usuario;
        $valido=true;
        $usu->email=$request->email;
        $usu->password=md5($request->password);
        $usuario=DB::table('usuarios')->where('email', $usu->email)->first();
        if ($usuario==null){$valido=false;}
        else{
            if($usu->password!=$usuario->password){$valido=false;}
            }
        if(!$valido){return back()->with('mensaxe',"Credenciais incorrectas");}
        else
            {
            if(isset($_SESSION['id'])){session_unset();}
            session_start();
            $_SESSION['id']  = $usuario->id;
            $_SESSION['nome']  = $usuario->nome;
            $_SESSION['email']  = $usuario->email;
            $_SESSION['direccion']  = $usuario->direccion;
            $_SESSION['telefono']  = $usuario->telefono;
            $_SESSION['dependencia']  = $usuario->dependencia;
            $_SESSION['activado']  = $usuario->activado;
            if(($usuario->dependencia)=="0")
            	{
                $usuarios=Usuario::all();
            	return view('/admin/admin', compact('usuarios'));
            	} 
            if(($usuario->dependencia)=="1")
                {
                $usuarios=Usuario::all();
                return view('/dietista/dietista', compact('usuarios'));
                } 
            if(($usuario->dependencia)!="0" && ($usuario->dependencia)!="1")
                {
                $usuarios=Usuario::all();
                return view('/cliente/cliente', compact('usuarios'));
                } 
            }
    }
    public function consultardietistas()
    {
       $usuarios=Usuario::all();
       return view('/admin/admin', compact('usuarios'));
    }
    public function activardietista()
    {
       $usuarios=Usuario::all();
       return view('/admin/activardietista', compact('usuarios'));
    }
    public function activarusuario(Request $request)
    {
       $novoValor=1;
       $mensaxe="Usuario activado";
       $usuario=DB::table('usuarios')->where('id', $request->id)->first();
       if($usuario->activado!=0)
        {
        $novoValor=0;
        $mensaxe="Usuario desactivado";
        }
       DB::table('usuarios')
            ->where('id', $request->id)
            ->update(['activado' => $novoValor]);
       return back()->with('mensaxe',$mensaxe);
    }
    public function eliminardietista()
    {
       $usuarios=Usuario::all();
       return view('/admin/eliminardietista', compact('usuarios'));
    }
    public function eliminarusuario(Request $request)
    {
       $mensaxe="Usuario borrado";
       $usuario=DB::table('usuarios')->where('id', $request->id)->first();
       DB::table('usuarios')
            ->where('id', $request->id)
            ->delete();
       return back()->with('mensaxe',$mensaxe);
    }
    public function consultarclientes()
    {
       $usuarios=Usuario::all();
       return view('/dietista/dietista', compact('usuarios'));
    }
    public function activarcliente()
    {
       $usuarios=Usuario::all();
       return view('/dietista/activarcliente', compact('usuarios'));
    }
    public function eliminarcliente()
    {
       $usuarios=Usuario::all();
       return view('/dietista/eliminarcliente', compact('usuarios'));
    }


    
}

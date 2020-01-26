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
        return back()->with('mensaxe',"Usuario creado");
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
            	$dietistas=DB::table('usuarios')->where('dependencia', "1");
            	//return view('/admin/admin', compact('usuario'));
            	return view('/admin/admin')->with(compact('usuario'))->with(compact('dietistas'));
            	} 
            }
    }
    
}

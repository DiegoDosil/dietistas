<?php

namespace App\Http\Controllers;

use App\Alimento;
use App\Dieta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlimentoController extends Controller
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
     * @param  \App\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function show(Alimento $alimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimento $alimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alimento $alimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alimento  $alimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimento $alimento)
    {
        //
    }
    public function obtenElementoAlimento(int $idalimento, int $idelemento)
    {
    $apiBase = 'https://www.bedca.net/bdpub/procquery.php';
    $headers = array(
            "Content-Type: text/xml",
            "Connection: close",
        );
            $rawXML = /** @lang XML */
            '<?xml version="1.0" encoding="utf-8"?>
                <foodquery>
                    <type level="2"/>
                    <selection>
                        <atribute name="f_id"/>
                        <atribute name="c_id"/>
                        <atribute name="c_ori_name"/>
                        <atribute name="best_location"/>
                    </selection>
                    <condition>
                        <cond1>
                            <atribute1 name="f_id"/>
                        </cond1>
                        <relation type="EQUAL"/>
                        <cond3>'.$idalimento.'</cond3>
                    </condition>
                    <condition>
                        <cond1>
                            <atribute1 name="c_id"/>
                        </cond1>
                        <relation type="EQUAL"/>
                        <cond3>'.$idelemento.'</cond3>
                    </condition>
                    <condition>
                        <cond1>
                            <atribute1 name="publico"/>
                        </cond1>
                        <relation type="EQUAL"/>
                        <cond3>1</cond3>
                    </condition>
                </foodquery>';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiBase);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $rawXML);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);
            $resultXML = simplexml_load_string($result);
            $resultado = json_decode(json_encode($resultXML));
            $aDevolver=0;
            try {
                $aDevolver=$resultado->food->foodvalue->best_location;
                if(!is_numeric($aDevolver)){$aDevolver=0;}
                }  
            catch (Exception $e) {$aDevolver=0;}
            return $aDevolver;
    }
    public function obtenAlimentos()
    {
    //Obtemos o array de alimentos:
    $apiBase = 'https://www.bedca.net/bdpub/procquery.php';
    $id=" ";
    $rawXML = /** @lang XML */
            '<?xml version="1.0" encoding="utf-8"?>
                <foodquery>
                    <type level="3h"/>
                    <selection>
                        <atribute name="f_id"/>
                        <atribute name="f_ori_name"/>
                    </selection>
                    <condition>
                        <cond1>
                            <atribute1 name="publico"/>
                        </cond1>
                        <relation type="EQUAL"/>
                        <cond3>
                            '.$id.'
                        </cond3>
                    </condition>
                    <order ordtype="ASC">
                        <atribute3 name="f_ori_name"/>
                    </order>
                </foodquery>';
    $headers = array(
            "Content-Type: text/xml",
            "Connection: close",
        );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiBase);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rawXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);
    $resultXML = simplexml_load_string($result);
    $foodGroups = json_decode(json_encode($resultXML));
    $alimentos=array();
    $numeroAlimentos=count($foodGroups->food);
    array_push($alimentos, $foodGroups->food[0]->f_id);
    array_push($alimentos, $foodGroups->food[1]->f_ori_name);
    $ultimoNome=$alimentos[1];
    $ultimoId=0;
    for($i=2;$i<$numeroAlimentos;$i++)
            {
            if($ultimoNome==trim($foodGroups->food[$i]->f_ori_name))
                {
                if($alimentos[$ultimoId]<$foodGroups->food[$i]->f_id)
                    {
                    $alimentos[$ultimoId]=$foodGroups->food[$i]->f_id;  
                    }
                }
            else
                {
                $ultimoNome=trim($foodGroups->food[$i]->f_ori_name);
                array_push($alimentos, $foodGroups->food[$i]->f_id);
                array_push($alimentos, trim($foodGroups->food[$i]->f_ori_name));
                $ultimoId=(count($alimentos))-2;
                }
            }
    //Regularización de ids incorrectos en Bedca:
    for ($i=2; $i < count($alimentos); $i++) 
        {
        $j=$i-1;
        if($alimentos[$i]=="Aceite de coco"){$alimentos[$j]="748";}
        if($alimentos[$i]=="Aceite de cacahuete"){$alimentos[$j]="747";}
        if($alimentos[$i]=="Aguacate"){$alimentos[$j]="2216";}
        }
    return $alimentos;
    }
    public function engadirAlimento(Request $request)
    {
    $dietas=Dieta::all();
    $alimentos=$this::obtenAlimentos();
    return view('/dietista/engadiralimento', compact('dietas'), compact('alimentos'));
    }
    public function engadeAlimento(Request $request)
    {
    //$dieta=new Dieta;
    $dietas=Dieta::all();
    $dieta=DB::table('dietas')->where('id', $request->id_dieta)->first();
    //Insertamos o alimento:
    $alimentos=$this::obtenAlimentos();
    $alim=new Alimento;
    $alim->dieta_id=$dieta->id;
    $alim->nome=$request->alimento01;
    $alim->cantidade=$request->cantidade;
    for ($i=0; $i < count($alimentos); $i++) 
            {
            if($alimentos[$i]==$alim->nome)
                {
                $i++;
                $alim->descripcion=$alimentos[$i];    
                }
            }
    if(Alimento::where('nome', '=', $alim->nome)->where('dieta_id', '=', $dieta->id)->count()>0)
        {
        return back()->with('mensaxe',"O alimento xa existe na dieta");    
        }
    else{
    $arrayElementos=[409,416,417,307,53,282,287,299,433,317,319,321,322,323,326];
    $aDatos = array();
    for($i=0;$i<count($arrayElementos);$i++)
            {
            $novoValor=$this::obtenElementoAlimento($request->alimento01, $arrayElementos[$i]);
            $novoValor=$novoValor*($request->cantidade);
            $novoValor=$novoValor/100;
            $novoValor=(int) round($novoValor);
            array_push($aDatos, $novoValor);
            }
    $dieta->enerxia=$dieta->enerxia+$aDatos[0];
    $dieta->proteina=$dieta->proteina+$aDatos[1];
    $dieta->auga=$dieta->auga+$aDatos[2];
    $dieta->fibra=$dieta->fibra+$aDatos[3];
    $dieta->carbohidratos=$dieta->carbohidratos+$aDatos[4];
    $dieta->monoinsat=$dieta->monoinsat+$aDatos[5];
    $dieta->poliinsat=$dieta->poliinsat+$aDatos[6];
    $dieta->acidosgsaturados=$dieta->acidosgsaturados+$aDatos[7];
    $dieta->colesterol=$dieta->colesterol+$aDatos[8];
    $dieta->calcio=$dieta->calcio+$aDatos[9];
    $dieta->ferro=$dieta->ferro+$aDatos[10];
    $dieta->potasio=$dieta->potasio+$aDatos[11];
    $dieta->magnesio=$dieta->magnesio+$aDatos[12];
    $dieta->sodio=$dieta->sodio+$aDatos[13];
    $dieta->fosforo=$dieta->fosforo+$aDatos[14];
    DB::table('dietas')
        ->where('id', $dieta->id)
        ->update([
        'enerxia' => $dieta->enerxia,
        'proteina' => $dieta->proteina,
        'auga' => $dieta->auga,
        'fibra' => $dieta->fibra,
        'carbohidratos' => $dieta->carbohidratos,
        'monoinsat' => $dieta->monoinsat,
        'poliinsat' => $dieta->poliinsat,
        'acidosgsaturados' => $dieta->acidosgsaturados,
        'colesterol' => $dieta->colesterol,
        'calcio' => $dieta->calcio,
        'ferro' => $dieta->ferro,
        'potasio' => $dieta->potasio,
        'magnesio' => $dieta->magnesio,
        'sodio' => $dieta->sodio,
        'fosforo' => $dieta->fosforo,
        'enerxia' => $dieta->enerxia
    ]);
    $alim->save();
    //return view('/dietista/engadiralimento', compact('alimentos'), compact('dietas'))->with('mensaxe',"Alimento engadido correctamente");
    return back()->with('mensaxe',"Alimento engadido correctamente");
    }//fin else
    }//fin function
}//fin class

<?php

namespace cultiva\Http\Controllers;

use Illuminate\Http\Request;

use cultiva\Http\Requests;
use cultiva\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use File;
use cultiva\Enterprise;
use cultiva\Seed;
use cultiva\Ground;
use cultiva\States;
use DB;


class FrontController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    public function find(Route $route){
        $this->data = Data::find($route->getParameter('admin'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeFarms = DB::table('active_farms')->where('status','!=','Terminado')->get();
        $state = States::all()->last();
         $terrenos= DB::table('active_farms')
            ->rightjoin('grounds', 'active_farms.id', '=', 'grounds.activeFarm_id')
            ->rightjoin('seeds', 'active_farms.seed_id', '=', 'seeds.id')
            ->get();
            
            $terrenos= DB::table('seeds')
            ->rightjoin('active_farms', 'seeds.id', '=', 'active_farms.seed_id')
            ->leftjoin('grounds', 'active_farms.id', '=', 'grounds.activeFarm_id')
            ->get();
        
        return view('admin.index',compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $files = $request->file;
        $dataExcel = [];
        

         Excel::selectSheetsByIndex(0)->load($files, function($reader) use ($dataExcel){
            $reader->skip(2);
            $result=$reader->all();    
            $result = $reader->noHeading()->get();
            foreach($result as $value) 
            {   
                if ($value[1]==null && $value[2]==null && $value[3]==null && $value[4]==null && $value[5]==null){
                    #Obtenemos valores nulos...
                    
                }elseif( $value[2]==null && $value[3]==null && $value[4]==null && is_numeric($value[5])) {
                   #Obtenemos valores de partidas...
                   $aux = $value[1];
                   
                }else{
                    $dataExcel[] = [
                    
                    "descripcion"                   => $value[1],
                    "preciogramo"                   => $value[2],
                    "tiempogestaciondias"           => $value[3],
                    "tiempocosechasdias"            => $value[4],
                    "rendimientoestimadoxm"         => $value[5],
                    "periodo"                       => $value[6],
                    "tiposuelo"                     => $value[7],
                    "tipoclima"                     => $value[8],
                    "periodo1"                       => $value[9],
                    "tiposuelo1"                     => $value[10],
                    "tipoclima1"              => $value[11]
                    ];
                    $Datos = new Seed;
                    $Datos->id_general                           = $value[1];
                    $Datos->description                               = $value[2];
                    $Datos->price                            = $value[3];
                    $Datos->gestation               = $value[4];
                    $Datos->harvest                    = $value[5];
                    $Datos->numseeds                    = $value[6];
                    $Datos->efficiency            = $value[7];
                    $Datos->period      = $value[8];
                    $Datos->typeground                      = $value[9];
                    $Datos->weatherType                            = $value[10];
                    $Datos->pathperfil                          = $value[11];
                    //$Datos->state_constructions_id                  =1;
                    
                    $Datos->save();
                    
                }
            }
        });
        
        return view('admin.index');
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
}

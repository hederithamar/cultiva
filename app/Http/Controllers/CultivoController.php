<?php

namespace cultiva\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use cultiva\Http\Requests;
use cultiva\Http\Controllers\Controller;
use cultiva\activeFarm;
use cultiva\States;
use cultiva\Ground;
use cultiva\Seed;
use Session;
use Carbon\Carbon;
use Redirect;
 
class CultivoController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    public function find(Route $route){
        $this->activeFarm = activeFarm::find($route->getParameter('cultivo'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = activeFarm::all();
        return view('cultivo.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos = activeFarm::all();
        return view('cultivo.create', compact('id'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function vincular($id)
    {
        $terreno = Ground::find($id);
        $semillas = DB::table('seeds')->where('id_general',$terreno->culture_id)->get();
    
        return view('cultivo.vincula', compact( 'semillas','terreno'));
    }
     public function asigna($semilla,$terreno)
    {  
        
        $terreno = Ground::find($terreno);
        $semilla1=Seed::find($semilla);
        //dd($semilla);
        $active = new activeFarm();        
        $date= Carbon::now();
        $active->dateInit= $date;
        $active->dateEnd= $date-> addDays($semilla1->gestation);
        $active->seed_id=$semilla1->id;
        $active->status="Iniciando";
        $active->save();
        //dd($active);
        $terreno->status="Ocupado";
        $terreno->activeFarm_id=$active->id;
        $terreno->save();
    
        return Redirect::route('admin.index');
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

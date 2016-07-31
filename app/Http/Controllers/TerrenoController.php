<?php

namespace cultiva\Http\Controllers;

use Illuminate\Http\Request;

use cultiva\Http\Requests;
use cultiva\Http\Controllers\Controller;
use cultiva\Ground;
use cultiva\States;
use cultiva\Seed;
use Session;
use Redirect;
use Log;
use Illuminate\Routing\Route;
use DB;
use Yajra\Datatables\Facades\Datatables;
class TerrenoController extends Controller
{
    public function __construct(){
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }
    public function find(Route $route){
        $this->ground = Ground::find($route->getParameter('terreno'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Ground::all();
        return view('terreno.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = States::lists('namestate', 'namestate');
        //$tipo= Seed::lists('id_general','id')->distint();
        //$tipo = Seed::table('lists')->distinct()->lists('type');
        $tipo = DB::table('seeds')->distinct()->lists('id_general','id_general');

        return view('terreno.create',compact('estados','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ground::create($request->all());
        Session::flash('message','terreno Creada Correctamente');
        $datos = Ground::all();
        return view('terreno.index',compact('datos'));
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
         $estados = States::lists('namestate', 'namestate');
        $tipo = DB::table('seeds')->distinct()->lists('id_general');
         return view('terreno.edit',compact('estados','tipo'),['ground'=>$this->ground]);
        
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

    public function totalterrenos()
    {
        $datos = Ground::all();
        return view('graph.totalterrenos', compact('datos'));
    }
    
    public function cosechaactual()
    {
        $datos = Ground::all();
        return view('graph.cosechaactual', compact('datos'));
    }

    public function historialcosecha()
    {
        $datos = Ground::all();
        return view('graph.historialcosecha', compact('datos'));
    }

}

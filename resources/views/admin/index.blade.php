@extends('layouts.admin')
 <?php use Carbon\Carbon;;?>
	@section('content')
		{!!Html::script('js/jquery-1.11.1.min.js')!!}
	  	{!! Html::script('js/jquery.popup.js')!!}
	  	{!! Html::style('css/popup.css')!!}
	@include('alerts.errors')
	<section>
  <div class="card car-bordered">
    <div class="col-md-12 ">
    <div class="col-md-1"></div>
    <div class="=col-md11">
     <div class="sub-heard-part">
      <ol class="breadcrumb m-b-0">
        <li><a href="{!!URL::to('admin')!!}">Home</a></li>
        <li class="active">Datos</li>
      </ol>
    </div>

<?php

  $json_string = file_get_contents("http://api.wunderground.com/api/77fc50dcdc344457/geolookup/conditions/alerts/currenthurricane/forecast//yesterday/q/MX/".$$terrenos->namestate.".json");
  $parsed_json = json_decode($json_string);
  $full = $parsed_json->{'current_observation'}->{'observation_location'}->{'full'};
  $history = $parsed_json->{'current_observation'}->{'observation_time'};
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";
  $airport = $parsed_json->{'current_observation'}->{'icon_url'};
  echo " in ${airport} full: ${full} history : ${history}"
?>
    </div>
      @include('alerts.success')

    <div class="row">
      <div class="card card-bordered style-success">
       
          <header>
          <div class="col-md-12 ">
          <div class="col-md-10 "><h4>Seguimiento a los terrenos de siembra</h4></div>
          <div class="col-md-2 ">
          </div>
          </div>
          </header>
       
       </div>
        <div id="table" class="table-editable">
                    <div class="forms">
                      <div class="form-body">
                        <!--aqui va la tabla-->
                        <table id="table1" class="table table-striped table-bordered table-hover table-condensed">
                          
                          <tbody>
                             @foreach($terrenos as $terreno)
                            <tr>
                            <div class="col-lg-12 col-sm-6">
                              <div class="card">
                                <div class="card-head card-head-sm style-success">
                                  <header>{{$terreno->description}}</header>
                                </div><!--end .card-head -->
                                <div class="card-body">
                                <div class="row">
                                  <div class="col-md-8  rowspan="4""> 
                                 
                                  <img src="perfil/{{$terreno->pathperfil}}" alt="" style=" width: 70px">
                                    <img src="perfil/{{$terreno->pathperfil}}" alt="" style=" width: 70px">
                                    <img src="/assets/img/avatar1.jpg" alt="" style=" width: 70px" />
                                    

                                  <img src="/Imagenes/Fase1{{$terreno->pathperfil}}" alt="" style=" width: 280px">
                                  </div>
                                  <div class="col-md-4">{!!Form::label('status',($terreno->gestation/3))!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                   <div class="col-md-4">{!!Form::label('status', $strFromArr = serialize($terreno->dateInit))!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                  <div class="col-md-4">{!!Form::label('status','Estatus del terreno:')!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>

                                  <div class="col-md-4">{!!Form::label('status','Estatus del terreno:')!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                  </div>                               
                                </div>
                                <div class="row">
                                  <div class="col-md-4">{!!Form::label('status','Estatus del terreno:')!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                  <div class="col-md-4">{!!Form::label('status','Estatus del terreno:')!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                  <div class="col-md-4">{!!Form::label('status','Estatus del terreno:')!!}
                                  <br>
                                  {!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}</div>
                                </div>
                                </div><!--end .card-body -->
                              </div><!--end .card -->
                            </div><!--end .col -->
                              
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                      {!!Html::script('js/jquery.dataTables.js')!!}
                      
                      <script type="text/javascript">
                      $(document).ready(function(){
                        $('#table1').DataTable();
                      });
                      </script>
                    </div>
                  </div>
                  
  </div>
</div>
	
	@endsection

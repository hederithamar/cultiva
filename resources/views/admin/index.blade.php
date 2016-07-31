@extends('layouts.admin')

	@section('content')
		{!!Html::script('js/jquery-1.11.1.min.js')!!}
	  	{!! Html::script('js/jquery.popup.js')!!}
	  	{!! Html::style('css/popup.css')!!}
	@include('alerts.errors')
	<section>
    <div class="sub-heard-part">
      <ol class="breadcrumb m-b-0">
        <li><a href="{!!URL::to('admin')!!}">Home</a></li>
        <li class="active">Datos</li>
      </ol>
    </div>
    
    @include('alerts.success')
    <!-- www.TuTiempo.net - Ancho:454px - Alto:91px -->
<?php

  $json_string = file_get_contents("http://api.wunderground.com/api/77fc50dcdc344457/geolookup/conditions/alerts/currenthurricane/forecast//yesterday/q/MX/".$state->namestate.".json");
  $parsed_json = json_decode($json_string);
  $full = $parsed_json->{'current_observation'}->{'observation_location'}->{'full'};
  $history = $parsed_json->{'current_observation'}->{'observation_time'};
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";
  $airport = $parsed_json->{'current_observation'}->{'icon_url'};
  echo " in ${airport} full: ${full} history : ${history}"
?>
    <div class="row">
    	<div class="card card-bordered style-success">
       
          <header>
          <div class="col-md-12 ">
          <div class="col-md-10 ">Titulo</div>
          <div class="col-md-2 ">
    		{!!link_to_route('admin.create', $title = 'Cargar Datos', $parameters = "", $attributes =   ['class'=>'btn btn-block ink-reaction btn-success'])!!}
    		</div>
    	</div>
    	</header>
            <div class="tools">
              
            </div>
       
       </div>


    	
    	
    </div>
	
	@endsection

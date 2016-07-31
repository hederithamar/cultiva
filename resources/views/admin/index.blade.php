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

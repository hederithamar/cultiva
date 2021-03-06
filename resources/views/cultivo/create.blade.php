@extends('layouts.admin')
	
	{!!Html::style('css/normalize.css')!!}
  {!!Html::style('css/demo.css')!!}
  {!!Html::style('css/filtergrid.css')!!}
  {!!Html::style('css/jquery-ui.css')!!}
  {!!Html::style('css/demo.css')!!}
  {!!Html::script('js/jquery-1.11.1.min.js')!!}
  {!!Html::script('js/jquery.popup.js')!!}
  {!!Html::style('css/popup.css')!!}

	@section('content')
	
		<div class="sub-heard-part">
			<ol class="breadcrumb m-b-0">
				<li><a href="{!!URL::to('admin')!!}">Home</a></li>
				<li><a href="">Cultivo Activo</a></li>
				<li class="active">Dar seguimiento a un a planta </li>
			</ol>
		</div>
		<!--/sub-heard-part-->	
		@include('alerts.request')
		<!--/forms-->
		{{$terreno}}
		<div class="card">
		<div class="forms-main">
			<h2 class="inner-tittle">Asignar una planta al terreno</h2>
				<div class="validation-form">
					<!---->
				{!!Form::open(['route'=>'cultivo.store', 'method'=>'POST'],array('onsubmit' => 'return false', 'id' => 'formulario_busqueda'))!!}

				@include('terreno.forms.emp')
				<div class="col-md-6 form-group"></div>
				<div class="col-md-6 form-group">
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
				</div>
				{!!Form::close()!!}
				<!---->
				</div>
		</div> 
		<div class="clearfix"></div>
		<!--//forms-->	
	</div>
	@endsection
	@section('scripts')
	@endsection
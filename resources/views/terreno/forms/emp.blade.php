<!-- Script para validar rfc-->
		{!!Html::script('js/ValidaRfc.js')!!}

<div class="card-body">
	<!--Nombre de la empresa-->
	<div class="col-md-6">
		{!!Form::label('size','Tamaño: (m²)')!!}
		{!!Form::text('size',null,['id' => 'size','required' => '','class'=>'form-control','placeholder'=>'Ingresa el tamaño del terreno'])!!}
	</div>
	<div class="col-md-6">
		{!!Form::label('status','Estatus del terreno:')!!}
		<br>
		{!!Form::select('status', array('Libre' => 'Libre', 'Ocupado' => 'Ocupado'), null, ['id'=>'type','class' => 'js-example-basic-single js-states form-control']);!!}
	</div>
	<div class="col-md-6">
		{!!Form::label('location','Ubicacon :')!!}
		{!!Form::select('location', $estados, null, ['id'=>'location','class' => 'js-example-tags js-states form-control']);!!}
	</div>
	<div class="col-md-6">
		{!!Form::label('description','Descripcion del terreno:')!!}
		{!!Form::select('description', array('Arenoso' => 'Suelo arenoso', 'Profundo' => 'Suelo Profundo','Arcilloso' => 'Suelo Arcilloso','Neutro' => 'Suelo Neutro','Acido' => 'Suelo Acido'), null, ['id'=>'description','class' => 'js-example-basic-single js-states form-control']);!!}
	</div>
	<!--Tipo de empresa-->
	<div class="col-md-6">
		{!!Form::label('irrigation_system','Cuenta con sistema de riego:')!!}
		<br>
		{!!Form::select('irrigation_system', array('No' => 'No', 'Si' => 'Si'), null, ['id'=>'irrigation_system','class' => 'js-example-basic-single js-states form-control']);!!}
	</div>
	<!--Nombre de la empresa-->
	<div class="col-md-6" style="display:none">
		{!!Form::label('user_id','Usuario id:')!!}
		{!!Form::text('user_id',null,['id' => 'user_id','class'=>'form-control','placeholder'=>'Ingresa el nombre de usuario'])!!}
	</div>
	
	<!--Dirección empresa-->
	<!--Nombre de la empresa-->
	<div class="col-md-6">
		{!!Form::label('culture_id','Cultivo preferido:')!!}
		{!!Form::select('culture_id', $tipo, null, ['id'=>'culture_id','class' => 'js-example-basic-single js-states form-control']);!!}
	</div>
	
</div>

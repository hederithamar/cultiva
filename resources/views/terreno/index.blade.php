@extends('layouts.admin')

  <!--libreria para manipular los acordeones -->
  {!!Html::script('js/jquery-1.11.1.min.js')!!}
  {!!Html::script('js/jquery-1.11.1.min.js')!!}
  {!! Html::script('js/jquery.popup.js')!!}
  {!! Html::style('css/popup.css')!!}

  @section('content')
  <section>
    <div class="sub-heard-part">
      <ol class="breadcrumb m-b-0">
        <li><a href="{!!URL::to('admin')!!}">Home</a></li>
        <li class="active">Terreno</li>
      </ol>
    </div>
    @include('alerts.success')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-bordered style-success">
        <div class="card-head">
          <header><i class="md md-location-city"></i> Terrenoss</header>
          <div class="tools">
          {!!link_to_route('terreno.create', $title = 'Nuevo', $parameters = "", $attributes =   ['class'=>'btn btn-block ink-reaction btn-primary-dark'])!!}
        </div>
        </div>
        <div class="card-body style-default-bright">
          <div clas="container" id="Layer1" overflow: scroll;>
            <div class="accordion">
              <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-1">Terrenoss</a>
                <div id="accordion-1" class="accordion-section-content">
                <!--//boton flotante-->    
                  <div class="float-right">
                    <div class="dropdown">
                    <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-cog icon_8"></i>
                      <i class="fa fa-chevron-down icon_8"></i>
                      <div class="ripple-wrapper"></div></a>
                      <ul class="dropdown-menu float-right">
                        <li>
                          <a href="excelempsup">
                          <i class="fa fa-download icon_9"></i>Descargar Excel</a>
                        </li>
                      </ul>
                    </div>
                  </div><!--//fin boton float-->   
                  <div class="row">
                      <div class="col-md-12">
                        <div class="card-body">
                          <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                            {!!link_to_route('terreno.totalterrenos', $title = 'Tus Espacios',null, $attributes = ['class'=>'informe btn btn-default-bright','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Ver Reporte'])!!}
                            {!!link_to_route('terreno.cosechaactual', $title = 'Cosecha Actual',null, $attributes = ['class'=>'informe btn btn-default-bright','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Ver Reporte'])!!}
                            {!!link_to_route('terreno.historialcosecha', $title = 'Historial de Cosechas',null, $attributes = ['class'=>'informe btn btn-default-bright','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Ver Reporte'])!!}
                          </div><!--end .btn-group -->
                        </div><!--end .card-body -->
                      </div><!--end .col -->
                    </div> 
                  <br>
                  <div id="table" class="table-editable">
                    <div class="forms">
                      <div class="form-body">
                        <!--aqui va la tabla-->
                        <table id="table1" class="table table-striped table-bordered table-hover table-condensed">
                          
                          <tbody>
                             @foreach($datos as $dato)
                            <tr>
                            <div class="col-lg-3 col-sm-6">
                              <div class="card">
                                <div class="card-head card-head-sm style-primary">
                                  <header>Terreno {{$dato->status}}</header>
                                  <div class="tools">
                                  {!!link_to_route('cultivo.vinc', $title = '', $parameters = $dato->id, $attributes = ['class'=>'btn btn-icon-toggle md md-add','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Vincular un cultivo'])!!}
                                  {!!link_to_route('terreno.edit', $title = '', $parameters = $dato, $attributes = ['class'=>'btn btn-icon-toggle fa fa-pencil','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Editar Terreno'])!!}
                                
                                  </div>
                                </div><!--end .card-head -->
                                <div class="card-body">
                                  Tamaño de terreno: {{$dato->size}} m² <br>
                                  Localidad: {{$dato->location}} <br>
                                  Descripcion: {{$dato->description}} <br>
                                  Sistema de riego: {{$dato->irrigation_system}} <br>
                                  Se pretende sembrar: {{$dato->culture_id}}
                                </div><!--end .card-body -->
                              </div><!--end .card -->
                            </div><!--end .col -->
                              
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
            </div><!--end .accordion-section-->
          </div>

        </div>
        </div>
      </div>
    </div>
  </section>
<script>
    $(function(){

      $('.informe').popup({
      types : {
        youtube : function(content, callback){
          content = '<iframe width="420" height="315" src="'+content+'" frameborder="0" allowfullscreen></iframe>';
      // Don't forget to call the callback!
        callback.call(this, content);
        }
    },
      width :1070,
    height : 480
    });

    });
  </script>
@endsection
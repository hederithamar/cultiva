@extends('layouts.admin')

  <!--libreria para manipular los acordeones -->
  {!!Html::style('css/normalize.css')!!}
  {!!Html::style('css/demo.css')!!}
  {!!Html::style('css/filtergrid.css')!!}
  {!!Html::style('css/jquery-ui.css')!!}
  {!!Html::style('css/demo.css')!!}
  {!!Html::script('js/jquery-1.11.1.min.js')!!}
  {!!Html::script('js/accordion.js')!!}
  {!!Html::style('css/jquery.dataTables.css')!!}

  @section('content')
  <section>
    <div class="sub-heard-part">
      <ol class="breadcrumb m-b-0">
        <li><a href="{!!URL::to('admin')!!}">Home</a></li>
        <li class="active">Semillas</li>
      </ol>
    </div>
    @include('alerts.success')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-bordered style-success">
        <div class="card-head">
          <header><i class="md md-location-city"></i> Semillas</header>
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
                  <br>
                  <div id="table" class="table-editable">
                    <div class="forms">
                      <div class="form-body">
                        <!--aqui va la tabla-->
                        <table id="table1" class="table table-striped table-bordered table-hover table-condensed">
                          
                          <tbody>
                             @foreach($semillas as $semilla)
                            <tr>
                            <div class="col-lg-3 col-sm-6">
                              <div class="card">
                                <div class="card-head card-head-sm style-primary">
                                  <header>{{$semilla->description}}</header>
                                  <div class="tools"> 
                                  {!!link_to_route('cultivo.asigna', $title = '', $parameters = [$semilla->id,$terreno->id], $attributes = ['class'=>'btn btn-icon-toggle md md-add','data-toggle'=>'tooltip','data-placement'=>'top','data-original-title'=>'Vincular un cultivo'])!!}
                                             
                                  </div>
                                </div><!--end .card-head -->
                                <div class="card-body">
                                 <img src="/Imagenes/{{$semilla->pathperfil}}" alt="" style=" width: 90px"> <br><br>
                                  
                                 <ul>Precio por Sobre (1g): {{$semilla->price}}  $</ul>
                                <ul>Siembra a Cosecha: {{$semilla->gestation}} día(s) </ul>
                                  <ul>Costo de siembra: {{(($semilla->price/$semilla->numseeds)*$semilla->efficiency)*$terreno->size}} $</ul>
                                  <ul>Superficie Siembra: {{$terreno->size}} m²</ul>
                                  <ul>Tiempo de cocecha: {{$semilla->harvest}} día(s)</ul>
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
            </div><!--end .accordion-section-->
          </div>

        </div>
        </div>
      </div>
    </div>
  </section>

@endsection
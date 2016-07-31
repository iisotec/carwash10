@extends('layouts.app')

@section('content')
<div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">REPORTES CARWASH</h3>
                  <div class="box-tools">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>REPORTE</th>
                      <th>VER</th>
                      
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reportes básicos, recaudó en el día, auto mas lavado y lavador que mas lava </td>
                      <td><a href="reportes/pdf" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>     
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Monto recaudado entre un rango de fechas</td>
                      <td><a href="reportes/pdf_fechas" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Reporte de Vehiculos en EXCEL
                      <td><a href="/reportes/reporte_excel" target="_blank" ><button class="btn btn-block btn-success btn-xs">DESCARGAR</button></a></td>   
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Reporte de Usuarios en EXCEL</td>
                      <td><a href="#" target="_blank" ><button class="btn btn-block btn-success btn-xs">DESCARGAR</button></a></td></td>
                    </tr>
                    
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
 </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                         <link rel="stylesheet" type="text/css" href="css/stylos_flexbox.css"/>
                         <!-- javascript del sistema laravel -->
                         <link rel="stylesheet" href="css/sistemalaravel.css">
                          <script src="javascript/sistemalaravel.js"></script>
                          <script>cargarlistado(1);</script>
                        <title>Car-Wash</title>
                    </head>
                    <body>

                        <form class="contenedor">

                            <div class="fila total">
                                <div class="columna columnatitulo">
                                    <img src="img/logo1.png" class="uno logo">
                                    <h2 class="title" class="uno">CAR-WASH</h2>
                                </div>
                               
                            </div>

                            <div class="fila aside-article">
                                <div class="columna aside">
                                    <ul>
                                      <li><a class="active" href="#">Lavador</a></li>
                                      <li><a class="active" href="include/lavados.html">Lavados</a></li>
                                     
                                    </ul>
                                </div>

                                <div class="columna article">
                                    <!-- contenido principal -->
                                    <section class="content"  id="contenido_principal">
                                    
                                    </section>
                                  
                                  <!-- cargador empresa -->
                                    <div style="display: none;" id="cargador_empresa" align="center">
                                        <br>
                                     

                                     <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

                                     <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

                                      <br>
                                     <hr style="color:#003" width="50%">
                                     <br>
                                   </div>

                                    <!-- <div class="fila total">
                                        <div class="columna col">   
                                             <label class="entrada">Ingrese Placa:</label>
                                             <input type="text" name="" class="entrada" placeholder="Placa">
                                             <input type="button" value="Buscar" class="bt_enviar">
                                        </div>
                                    
                                    </div> -->
                                   <!--  <div class="fila total">
                                       <div class="columna col">   
                                            <label>Categoria</label>
                                           <select name="cars">
                                                 <option value="volvo" class="primero">Seleccione una categoria</option>
                                                 <option value="saab">taxi</option>
                                                 <option value="fiat">Camion</option>
                                                 <option value="audi">Fuso</option>
                                           </select>
                                           <label>Empeado</label>
                                           <input type="text" name="" class="entrada">
                                       </div>
                                   </div>
                                    -->
                                   <!--  <div class="fila total">
                                       <div class="columna comentarios col">   
                                           <label for="nombre">Descripcion</label>
                                           <textarea name="comment" form="nombre" rows="4" class="entradaComen" placeholder="Ingrese descripcion del vehiculo"></textarea>
                                       </div>
                                   </div>
                                   
                                   <div class="fila total">
                                       <div class="columna botonMayor">   
                                            <input type="button" value="Agregar Servicio" class="bt_enviar bt_dos">
                                       </div>
                                   </div> -->
                                    <!-- <form class="navbar-form navbar-left" role="search">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Buscar por Placa">
                                      </div>
                                      <button type="submit" class="btn btn-default">Buscar</button>
                                     -->
                                     <div class="col-lg-6">
                                     </div><!-- /.col-lg-6 -->
                                 </br>

                                    <div class="fila total">
                                        <div class="columna ">   
                                             <!-- <p>tabla</p> -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            
                            <div class="fila total">
                                <div class="columna pie">
                                    <p class="pies">Derechos reservados @unamba</p>
                                </div>
                            </div>

                        </form>
                    </body>
                    </html>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

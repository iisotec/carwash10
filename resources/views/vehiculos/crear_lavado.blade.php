<!-- Placa Field -->
<h2>Detalle lavado</h2>
<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control precio']) !!}
</div>
<div class="form-group">
    <input type="hidden" class='usuario' value="{!!Auth::user()->id!!}">
</div>
<div class="form-group">
    <input type="hidden" class='vehiculo' value="{!! $vehiculo->id!!}">
</div>

<div class="form-group">
    <input type="hidden" class='estado' value="Pendiente">
</div>
<!-- ESTO ES UN TOQUE PARA EL ENVIO DEL FORMULARIO HACIA EL SERVIDOR CON AJAX-->
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! Form::open(['method'=>'POST' , 'id'=>'form_insert']) !!}

{!! Form::close() !!}

@section('scripts')
<script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

       $(".envi").on('click',mostrar);
        function mostrar()
        {
          /*alert("lleque");*/
          var precio = $('.precio').val();
          var usuario = $('.usuario').val();
          var vehiculo = $('.vehiculo').val();
          var estado = $('.estado').val();
          /*var form = $('#form_insert');*/
          /*alert(form.attr("action"));*/
          $.ajax({
          data:{'precio':precio,'usuario':usuario, 'vehiculo':vehiculo, 'estado':estado},
          url: '../lavado/',
          type: 'post',
          success:function(data){ 
            alert(data);
            window.location="/vehiculos";
            /*if (parseInt(data)==0) {
              alert("usuario disponible");
            }
            else
             alert("usuario NO disponible");*/
            }

          })
        }
      
    </script>
@endsection


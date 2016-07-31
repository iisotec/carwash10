<table class="table table-responsive" id="lavados-table">
    <thead>
        <th>Precio</th>
        <th>Fecha Lavado</th>
        <th>Estado Lavado</th>
        <th>Paca Vehiculo</th>
        <th>Tipo</th>
        <th>Usuario</th>
        
        
        
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($lavados as $lavado)
    <?php 
     if ($lavado->estado_lavado=='Pendiente'){?>
        <tr data-id="{{$lavado->id}}">
            <td>{!! $lavado->precio !!}</td>
            <td>{!! $lavado->fecha_lavado !!}</td>
            <td><span class=" atenderVisitante btn btn-warning">{!! $lavado->estado_lavado !!}</span></td>  
            <td>{!! $lavado->vehiculo->placa !!}</td>
            <td>{!! $lavado->vehiculo->tipo !!}</td>
            <td>{!! $lavado->user->name !!} {!! $lavado->user->apellidos !!}</td>
                      
            <td>
                {!! Form::open(['route' => ['lavados.destroy', $lavado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="#!" class='btn btn-default btn-xs btn-atender'><i class="glyphicon glyphicon-saved">ATENDER</i></a>
                    <a href="{!! route('lavados.show', [$lavado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <!-- <a href="{!! route('lavados.edit', [$lavado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                    <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->

                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        <?php }?>
    @endforeach
    </tbody>
</table>
<meta name="csrf-token" content="{{ csrf_token() }}">
{!! Form::open(['method'=>'POST' , 'id'=>'form_insert']) !!}

{!! Form::close() !!}

@section("scripts")
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
        $('.btn-atender').on('click', CambiarLavado);
                function CambiarLavado(e){
                    e.preventDefault();
                    var row = $(this).parents('tr');
                    var id= row.data('id');

                    /*alert('LLEGUE AQUI:'+id);*/
                    $.ajax({
                        data : {'id': id},
                        url : '../atender_lavado',
                        type : 'post',
                        success : function(data){
                            row.fadeOut();
                            alert(data);
                        }
                    });
                }
</script>
@endsection

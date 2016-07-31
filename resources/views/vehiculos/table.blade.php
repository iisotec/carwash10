<table class="table table-responsive" id="vehiculos-table">
    <thead>
        <th>Placa</th>
        <th>Fecha Registro</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{!! $vehiculo->placa !!}</td>
            <td>{!! $vehiculo->fecha_registro !!}</td>
            <td>{!! $vehiculo->tipo !!}</td>
            <td>{!! $vehiculo->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['vehiculos.destroy', $vehiculo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehiculos.show', [$vehiculo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vehiculos.edit', [$vehiculo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="table table-responsive" id="socursals-table">
    <thead>
        <th>Nombre</th>
        <th>Lugar</th>
        <th>Direccion</th>
        <th>Usuario</th>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($socursals as $socursal)
        <tr>
            <td>{!! $socursal->nombre !!}</td>
            <td>{!! $socursal->lugar !!}</td>
            <td>{!! $socursal->direccion !!}</td>
            <td>{!! $socursal->user->name !!} <td>{!! $socursal->user->apellidos !!}</td>
            
            <td>
                {!! Form::open(['route' => ['socursals.destroy', $socursal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('socursals.show', [$socursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('socursals.edit', [$socursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

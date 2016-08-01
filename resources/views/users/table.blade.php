<table class="table table-responsive" id="users-table">
    <thead>
        <th>Dni</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Tipo Usuario</th>
        <th>Correo</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->dni !!}</td>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->apellidos !!}</td>
            <?php if ($user->tipo_usuario=='1'): ?>
             <td><span class=" atenderVisitante btn btn-primary">Administrador</span></td>       
            <?php elseif ($user->tipo_usuario=='2'): ?>
             <td><span class=" atenderVisitante btn btn-success">Cajero</span></td>          
            <?php else: ?>
            <td><span class=" atenderVisitante btn btn-info">Lavador</span></td>
            <?php endif ?>
            <td>{!! $user->email !!}</td>
            
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Desea eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

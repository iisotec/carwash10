<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Placa Field -->
<div class="form-group">
    {!! Form::label('dni', 'DNI:') !!}
    <p>{!! $user->dni !!}</p>
</div>

<!-- Fecha Registro Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{!! $user->apellidos !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('tipo_usuario', 'Tipo_usuario:') !!}
    <p>{!! $user->tipo_usuario !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('email', 'Correo:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Registrado:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>


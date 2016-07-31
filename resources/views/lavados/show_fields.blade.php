<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $lavado->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    <p>{!! $lavado->precio !!}</p>
</div>

<!-- Lugar Field -->
<div class="form-group">
    {!! Form::label('fecha_lavado', 'Fecha Lavado:') !!}
    <p>{!! $lavado->fecha_lavado !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('user', 'Usuario:') !!}
    <p>{!! $lavado->user->id !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('vehiculo', 'Vehiculo:') !!}
    <p>{!! $lavado->vehiculo->id !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('estado_lavado', 'Estado lavado:') !!}
    <p>{!! $lavado->estado_lavado !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $lavado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $lavado->updated_at !!}</p>
</div>


<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_lavado', 'Estado lavado:') !!}
    {{ Form::select('estado_lavado', ['Pendiente','Lavado'], null, ['class' => 'form-control']) }}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehiculo', 'Vehiculo:') !!}
    {{ Form::text('vehiculo', null, ['class' => 'form-control']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('lavados.index') !!}" class="btn btn-default">Cancelar</a>
</div>

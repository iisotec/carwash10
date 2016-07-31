<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar', 'Lugar:') !!}
    {!! Form::select('lugar', ['Abancay' => 'Abancay', 'Aymaraes' => 'Aymaraes', 'Andahuaylas' => 'Andahuaylas', 'Grau' => 'Grau', 'Chincheros' => 'Chincheros', 'Antabamba' => 'Antabamba', 'Cotabambas' => 'Cotabambas'], null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- <div class="form-group col-sm-6">
    {!! Form::label('usaurio', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('socursals.index') !!}" class="btn btn-default">Cancel</a>
</div>

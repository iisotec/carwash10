<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
      </head>
  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>Reporte de cuánto se recaudó en cada día</h1>
          <p>Relizado por: {!!Auth::user()->name!!} {!!Auth::user()->apellidos!!}</p>
          <div class="date">Fecha: {{ $date }}</div>
        </div>
      </div>
      <table class="table table-responsive" border="0.5" cellspacing="1" cellpadding="2">
          <thead>
            <tr>
              <th>DIA</th>
              <th>RECAUDO TOTAL</th>
            </tr>
          </thead>
          <tbody>
           @foreach($recaudo_dia as $datos)
              <tr>
                  <td align="center"> {!! $datos->dia !!} del mes de {!! $datos->mes !!}</td>
                  <td align="center">S./ {!! $datos->total !!} .00</td>
              </tr>
          @endforeach
          </tbody>
      </table>
  </body>
</html>




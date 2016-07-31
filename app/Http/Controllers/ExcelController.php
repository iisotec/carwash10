<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use \App\Models\Vehiculo;
class ExcelController extends Controller
{

	public function reporteExcel()
	{

		Excel::create('Reporte de Vehiculos en Excel', function($excel)
		{
			$excel->sheet('Sheetname', function($sheet)
			{	$Vehiculos = Vehiculo::select('placa','fecha_registro', 'tipo','descripcion')->get();
				$data =[];
				array_push($data, array('','','REPORTE DE VEHICULOS EN EXCEL'));
				array_push($data, array('PLACA', 'FECHA REGISTRO', 'TIPO', 'DESCRIPCION'));
				foreach ($Vehiculos as $key => $value) {
					array_push($data, array($value->placa, (string)$value->fecha_registro, $value->tipo, $value->descripcion));
					# code...
				}
			
				$sheet->fromArray($data, null, 'A1', false, false);
			});
		})->download('xlsx');
	}
}
?>
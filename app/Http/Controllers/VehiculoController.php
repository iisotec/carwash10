<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;
use App\Repositories\VehiculoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VehiculoController extends InfyOmBaseController
{
    /** @var  VehiculoRepository */
    private $vehiculoRepository;

    public function __construct(VehiculoRepository $vehiculoRepo)
    {
        $this->vehiculoRepository = $vehiculoRepo;
    }

    /**
     * Display a listing of the Vehiculo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        #BUSQUEDA POR PLACA
        /*$user = DB::table('vehiculos')
                        ->where('placa', 'like', '%$valor_buscar%')
                        ->get(); 
        dd("HOOLA:".$user);                        */
        $valor_buscar = trim($request->get('name'));
        if($valor_buscar!="")
        {
        $this->vehiculoRepository->pushCriteria(new RequestCriteria($request));
        $vehiculos = $this->vehiculoRepository->all();
        $consulta = $vehiculos->where('placa', $valor_buscar);
        return view('vehiculos.index')
            ->with('vehiculos', $consulta);
        }
        else
        {
        $this->vehiculoRepository->pushCriteria(new RequestCriteria($request));
        $vehiculos = $this->vehiculoRepository->all();
        return view('vehiculos.index')
            ->with('vehiculos', $vehiculos);

        }
        
    }

    /**
     * Show the form for creating a new Vehiculo.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created Vehiculo in storage.
     *
     * @param CreateVehiculoRequest $request
     *
     * @return Response
     */
    public function store(CreateVehiculoRequest $request)
    {
        $input = $request->all();

        $vehiculo = $this->vehiculoRepository->create($input);

        Flash::success('Vehiculo saved successfully.');

        return redirect(route('vehiculos.index'));
    }

    /**
     * Display the specified Vehiculo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehiculo = $this->vehiculoRepository->findWithoutFail($id);

        if (empty($vehiculo)) {
            Flash::error('Vehiculo not found');

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.show')->with('vehiculo', $vehiculo);
    }

    /**
     * Show the form for editing the specified Vehiculo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehiculo = $this->vehiculoRepository->findWithoutFail($id);

        if (empty($vehiculo)) {
            Flash::error('Vehiculo not found');

            return redirect(route('vehiculos.index'));
        }

        return view('vehiculos.edit')->with('vehiculo', $vehiculo);
    }

    /**
     * Update the specified Vehiculo in storage.
     *
     * @param  int              $id
     * @param UpdateVehiculoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehiculoRequest $request)
    {
        $vehiculo = $this->vehiculoRepository->findWithoutFail($id);

        if (empty($vehiculo)) {
            Flash::error('Vehiculo not found');

            return redirect(route('vehiculos.index'));
        }

        $vehiculo = $this->vehiculoRepository->update($request->all(), $id);

        Flash::success('Vehiculo updated successfully.');

        return redirect(route('vehiculos.index'));
    }

    /**
     * Remove the specified Vehiculo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehiculo = $this->vehiculoRepository->findWithoutFail($id);

        if (empty($vehiculo)) {
            Flash::error('Vehiculo not found');

            return redirect(route('vehiculos.index'));
        }

        $this->vehiculoRepository->delete($id);

        Flash::success('Vehiculo deleted successfully.');

        return redirect(route('vehiculos.index'));
    }
}

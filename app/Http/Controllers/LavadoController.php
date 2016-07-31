<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLavadoRequest;
use App\Http\Requests\UpdateLavadoRequest;
use App\Repositories\LavadoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Lavado;

class LavadoController extends InfyOmBaseController
{
    /** @var  LavadoRepository */
    private $lavadoRepository;

    public function __construct(LavadoRepository $lavadoRepo)
    {
        $this->lavadoRepository = $lavadoRepo;
    }

    /**
     * Display a listing of the Lavado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lavadoRepository->pushCriteria(new RequestCriteria($request));
        $lavados = $this->lavadoRepository->all();

        return view('lavados.index')
            ->with('lavados', $lavados);
    }
    protected function crear(Request $request)
    {
        if ($request->ajax()) {
            /*$dataLavado = Request::all();*/
            $lavado = new Lavado;
            $lavado->user_id = $request['usuario'];
            $lavado->vehiculo_id = $request['vehiculo'];
            $lavado->precio = $request['precio'];
            $lavado->estado_lavado = $request['estado'];
            $resul = $lavado->save();
            if ($resul) {
                # code...
                return "SE INSERTO CORRECTAMENTE..!";
            }
            else
            {
             return "ERROR NO SE HA INSERTADO";   
            }
        }
            
    }

    protected function atender(Request $request)
    {
        if ($request->ajax()) {
            /*return "LLEGUE AL SERVER";
*/          /*$lavado = new Lavado;*/
            /*$lavado->$request['id']= ;*/
            $lvado = Lavado::find($request['id']);
            $lvado->estado_lavado = 'Lavado';
            $correcto= $lvado->save();
            /*$dataLavado = Request::all();*/
            /*$lavado = new Lavado;
            $lavado->user_id = $request['usuario'];
            $lavado->vehiculo_id = $request['vehiculo'];
            $lavado->precio = $request['precio'];
            $lavado->estado_lavado = $request['estado'];
            $resul = $lavado->save();*/
            if ($correcto) {
                # code...
                return "SE ACTUALIZADO CORRECTAMENTE..!";
            }
            else
            {
             return "ERROR ...!!";   
            }
        }
            
    }
    

    /**
     * Show the form for creating a new Lavado.
     *
     * @return Response
     */
    public function create()
    {
        return view('lavados.create');
    }

    /**
     * Store a newly created Lavado in storage.
     *
     * @param CreateLavadoRequest $request
     *
     * @return Response
     */
    public function store(CreateLavadoRequest $request)
    {
        $input = $request->all();

        $lavado = $this->lavadoRepository->create($input);

        Flash::success('Lavado guardado correctamente.');

        return redirect(route('lavados.index'));
    }

    /**
     * Display the specified Lavado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lavado = $this->lavadoRepository->findWithoutFail($id);

        if (empty($lavado)) {
            Flash::error('Lavado not found');

            return redirect(route('lavados.index'));
        }

        return view('lavados.show')->with('lavado', $lavado);
    }

    /**
     * Show the form for editing the specified Lavado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lavado = $this->lavadoRepository->findWithoutFail($id);

        if (empty($lavado)) {
            Flash::error('Lavado not found');

            return redirect(route('lavados.index'));
        }

        return view('lavados.edit')->with('lavado', $lavado);
    }

    /**
     * Update the specified Lavado in storage.
     *
     * @param  int              $id
     * @param UpdateLavadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLavadoRequest $request)
    {
        $lavado = $this->lavadoRepository->findWithoutFail($id);

        if (empty($lavado)) {
            Flash::error('Lavado not found');

            return redirect(route('lavados.index'));
        }

        $lavado = $this->lavadoRepository->update($request->all(), $id);

        Flash::success('Lavado updated successfully.');

        return redirect(route('lavados.index'));
    }

    /**
     * Remove the specified Lavado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lavado = $this->lavadoRepository->findWithoutFail($id);

        if (empty($lavado)) {
            Flash::error('Lavado not found');

            return redirect(route('lavados.index'));
        }

        $this->lavadoRepository->delete($id);

        Flash::success('Lavado Corectamente eliminado.');

        return redirect(route('lavados.index'));
    }
}

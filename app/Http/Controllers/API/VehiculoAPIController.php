<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehiculoAPIRequest;
use App\Http\Requests\API\UpdateVehiculoAPIRequest;
use App\Models\Vehiculo;
use App\Repositories\VehiculoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VehiculoController
 * @package App\Http\Controllers\API
 */

class VehiculoAPIController extends InfyOmBaseController
{
    /** @var  VehiculoRepository */
    private $vehiculoRepository;

    public function __construct(VehiculoRepository $vehiculoRepo)
    {
        $this->vehiculoRepository = $vehiculoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehiculos",
     *      summary="Get a listing of the Vehiculos.",
     *      tags={"Vehiculo"},
     *      description="Get all Vehiculos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Vehiculo")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->vehiculoRepository->pushCriteria(new RequestCriteria($request));
        $this->vehiculoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vehiculos = $this->vehiculoRepository->all();

        return $this->sendResponse($vehiculos->toArray(), 'Vehiculos retrieved successfully');
    }

    /**
     * @param CreateVehiculoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/vehiculos",
     *      summary="Store a newly created Vehiculo in storage",
     *      tags={"Vehiculo"},
     *      description="Store Vehiculo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vehiculo that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vehiculo")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vehiculo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVehiculoAPIRequest $request)
    {
        $input = $request->all();

        $vehiculos = $this->vehiculoRepository->create($input);

        return $this->sendResponse($vehiculos->toArray(), 'Vehiculo saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehiculos/{id}",
     *      summary="Display the specified Vehiculo",
     *      tags={"Vehiculo"},
     *      description="Get Vehiculo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehiculo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vehiculo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            return Response::json(ResponseUtil::makeError('Vehiculo not found'), 404);
        }

        return $this->sendResponse($vehiculo->toArray(), 'Vehiculo retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateVehiculoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/vehiculos/{id}",
     *      summary="Update the specified Vehiculo in storage",
     *      tags={"Vehiculo"},
     *      description="Update Vehiculo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehiculo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vehiculo that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vehiculo")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Vehiculo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVehiculoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vehiculo $vehiculo */
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            return Response::json(ResponseUtil::makeError('Vehiculo not found'), 404);
        }

        $vehiculo = $this->vehiculoRepository->update($input, $id);

        return $this->sendResponse($vehiculo->toArray(), 'Vehiculo updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vehiculos/{id}",
     *      summary="Remove the specified Vehiculo from storage",
     *      tags={"Vehiculo"},
     *      description="Delete Vehiculo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vehiculo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Vehiculo $vehiculo */
        $vehiculo = $this->vehiculoRepository->find($id);

        if (empty($vehiculo)) {
            return Response::json(ResponseUtil::makeError('Vehiculo not found'), 404);
        }

        $vehiculo->delete();

        return $this->sendResponse($id, 'Vehiculo deleted successfully');
    }
}

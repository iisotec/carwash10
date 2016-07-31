<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLavadoAPIRequest;
use App\Http\Requests\API\UpdateLavadoAPIRequest;
use App\Models\Lavado;
use App\Repositories\LavadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LavadoController
 * @package App\Http\Controllers\API
 */

class LavadoAPIController extends InfyOmBaseController
{
    /** @var  LavadoRepository */
    private $lavadoRepository;

    public function __construct(LavadoRepository $lavadoRepo)
    {
        $this->lavadoRepository = $lavadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/lavados",
     *      summary="Get a listing of the Lavados.",
     *      tags={"Lavado"},
     *      description="Get all Lavados",
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
     *                  @SWG\Items(ref="#/definitions/Lavado")
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
        $this->lavadoRepository->pushCriteria(new RequestCriteria($request));
        $this->lavadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lavados = $this->lavadoRepository->all();

        return $this->sendResponse($lavados->toArray(), 'Lavados retrieved successfully');
    }

    /**
     * @param CreateLavadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/lavados",
     *      summary="Store a newly created Lavado in storage",
     *      tags={"Lavado"},
     *      description="Store Lavado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Lavado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Lavado")
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
     *                  ref="#/definitions/Lavado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLavadoAPIRequest $request)
    {
        $input = $request->all();

        $lavados = $this->lavadoRepository->create($input);

        return $this->sendResponse($lavados->toArray(), 'Lavado saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/lavados/{id}",
     *      summary="Display the specified Lavado",
     *      tags={"Lavado"},
     *      description="Get Lavado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Lavado",
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
     *                  ref="#/definitions/Lavado"
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
        /** @var Lavado $lavado */
        $lavado = $this->lavadoRepository->find($id);

        if (empty($lavado)) {
            return Response::json(ResponseUtil::makeError('Lavado not found'), 404);
        }

        return $this->sendResponse($lavado->toArray(), 'Lavado retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLavadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/lavados/{id}",
     *      summary="Update the specified Lavado in storage",
     *      tags={"Lavado"},
     *      description="Update Lavado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Lavado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Lavado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Lavado")
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
     *                  ref="#/definitions/Lavado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLavadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lavado $lavado */
        $lavado = $this->lavadoRepository->find($id);

        if (empty($lavado)) {
            return Response::json(ResponseUtil::makeError('Lavado not found'), 404);
        }

        $lavado = $this->lavadoRepository->update($input, $id);

        return $this->sendResponse($lavado->toArray(), 'Lavado updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/lavados/{id}",
     *      summary="Remove the specified Lavado from storage",
     *      tags={"Lavado"},
     *      description="Delete Lavado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Lavado",
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
        /** @var Lavado $lavado */
        $lavado = $this->lavadoRepository->find($id);

        if (empty($lavado)) {
            return Response::json(ResponseUtil::makeError('Lavado not found'), 404);
        }

        $lavado->delete();

        return $this->sendResponse($id, 'Lavado deleted successfully');
    }
}

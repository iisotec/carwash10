<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSocursalAPIRequest;
use App\Http\Requests\API\UpdateSocursalAPIRequest;
use App\Models\Socursal;
use App\Repositories\SocursalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SocursalController
 * @package App\Http\Controllers\API
 */

class SocursalAPIController extends InfyOmBaseController
{
    /** @var  SocursalRepository */
    private $socursalRepository;

    public function __construct(SocursalRepository $socursalRepo)
    {
        $this->socursalRepository = $socursalRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/socursals",
     *      summary="Get a listing of the Socursals.",
     *      tags={"Socursal"},
     *      description="Get all Socursals",
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
     *                  @SWG\Items(ref="#/definitions/Socursal")
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
        $this->socursalRepository->pushCriteria(new RequestCriteria($request));
        $this->socursalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $socursals = $this->socursalRepository->all();

        return $this->sendResponse($socursals->toArray(), 'Socursals retrieved successfully');
    }

    /**
     * @param CreateSocursalAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/socursals",
     *      summary="Store a newly created Socursal in storage",
     *      tags={"Socursal"},
     *      description="Store Socursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Socursal that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Socursal")
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
     *                  ref="#/definitions/Socursal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSocursalAPIRequest $request)
    {
        $input = $request->all();

        $socursals = $this->socursalRepository->create($input);

        return $this->sendResponse($socursals->toArray(), 'Socursal saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/socursals/{id}",
     *      summary="Display the specified Socursal",
     *      tags={"Socursal"},
     *      description="Get Socursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Socursal",
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
     *                  ref="#/definitions/Socursal"
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
        /** @var Socursal $socursal */
        $socursal = $this->socursalRepository->find($id);

        if (empty($socursal)) {
            return Response::json(ResponseUtil::makeError('Socursal not found'), 404);
        }

        return $this->sendResponse($socursal->toArray(), 'Socursal retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSocursalAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/socursals/{id}",
     *      summary="Update the specified Socursal in storage",
     *      tags={"Socursal"},
     *      description="Update Socursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Socursal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Socursal that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Socursal")
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
     *                  ref="#/definitions/Socursal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSocursalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Socursal $socursal */
        $socursal = $this->socursalRepository->find($id);

        if (empty($socursal)) {
            return Response::json(ResponseUtil::makeError('Socursal not found'), 404);
        }

        $socursal = $this->socursalRepository->update($input, $id);

        return $this->sendResponse($socursal->toArray(), 'Socursal updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/socursals/{id}",
     *      summary="Remove the specified Socursal from storage",
     *      tags={"Socursal"},
     *      description="Delete Socursal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Socursal",
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
        /** @var Socursal $socursal */
        $socursal = $this->socursalRepository->find($id);

        if (empty($socursal)) {
            return Response::json(ResponseUtil::makeError('Socursal not found'), 404);
        }

        $socursal->delete();

        return $this->sendResponse($id, 'Socursal deleted successfully');
    }
}

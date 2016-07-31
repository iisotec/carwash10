<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSocursalRequest;
use App\Http\Requests\UpdateSocursalRequest;
use App\Repositories\SocursalRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SocursalController extends InfyOmBaseController
{
    /** @var  SocursalRepository */
    private $socursalRepository;

    public function __construct(SocursalRepository $socursalRepo)
    {
        $this->socursalRepository = $socursalRepo;
    }

    /**
     * Display a listing of the Socursal.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->socursalRepository->pushCriteria(new RequestCriteria($request));
        $socursals = $this->socursalRepository->all();

        return view('socursals.index')
            ->with('socursals', $socursals);
    }

    /**
     * Show the form for creating a new Socursal.
     *
     * @return Response
     */
    public function create()
    {
        return view('socursals.create');
    }

    /**
     * Store a newly created Socursal in storage.
     *
     * @param CreateSocursalRequest $request
     *
     * @return Response
     */
    public function store(CreateSocursalRequest $request)
    {
        $input = $request->all();

        $socursal = $this->socursalRepository->create($input);

        Flash::success('Socursal saved successfully.');

        return redirect(route('socursals.index'));
    }

    /**
     * Display the specified Socursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $socursal = $this->socursalRepository->findWithoutFail($id);

        if (empty($socursal)) {
            Flash::error('Socursal not found');

            return redirect(route('socursals.index'));
        }

        return view('socursals.show')->with('socursal', $socursal);
    }

    /**
     * Show the form for editing the specified Socursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $socursal = $this->socursalRepository->findWithoutFail($id);

        if (empty($socursal)) {
            Flash::error('Socursal not found');

            return redirect(route('socursals.index'));
        }

        return view('socursals.edit')->with('socursal', $socursal);
    }

    /**
     * Update the specified Socursal in storage.
     *
     * @param  int              $id
     * @param UpdateSocursalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSocursalRequest $request)
    {
        $socursal = $this->socursalRepository->findWithoutFail($id);

        if (empty($socursal)) {
            Flash::error('Socursal not found');

            return redirect(route('socursals.index'));
        }

        $socursal = $this->socursalRepository->update($request->all(), $id);

        Flash::success('Socursal updated successfully.');

        return redirect(route('socursals.index'));
    }

    /**
     * Remove the specified Socursal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $socursal = $this->socursalRepository->findWithoutFail($id);

        if (empty($socursal)) {
            Flash::error('Socursal not found');

            return redirect(route('socursals.index'));
        }

        $this->socursalRepository->delete($id);

        Flash::success('Socursal deleted successfully.');

        return redirect(route('socursals.index'));
    }
}

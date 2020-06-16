<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use App\Repositories\MovementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MovementController extends AppBaseController
{
    /** @var  MovementRepository */
    private $movementRepository;

    public function __construct(MovementRepository $movementRepo)
    {
        $this->movementRepository = $movementRepo;
    }

    /**
     * Display a listing of the Movement.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $movements = $this->movementRepository->all();

        return view('movements.index')
            ->with('movements', $movements);
    }

    /**
     * Show the form for creating a new Movement.
     *
     * @return Response
     */
    public function create()
    {
        return view('movements.create');
    }

    /**
     * Store a newly created Movement in storage.
     *
     * @param CreateMovementRequest $request
     *
     * @return Response
     */
    public function store(CreateMovementRequest $request)
    {
        $input = $request->all();

        $movement = $this->movementRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/movements.singular')]));

        return redirect(route('movements.index'));
    }

    /**
     * Display the specified Movement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/movements.singular')]));

            return redirect(route('movements.index'));
        }

        return view('movements.show')->with('movement', $movement);
    }

    /**
     * Show the form for editing the specified Movement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/movements.singular')]));

            return redirect(route('movements.index'));
        }

        return view('movements.edit')->with('movement', $movement);
    }

    /**
     * Update the specified Movement in storage.
     *
     * @param int $id
     * @param UpdateMovementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovementRequest $request)
    {
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/movements.singular')]));

            return redirect(route('movements.index'));
        }

        $movement = $this->movementRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/movements.singular')]));

        return redirect(route('movements.index'));
    }

    /**
     * Remove the specified Movement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            Flash::error(__('messages.not_found', ['model' => __('models/movements.singular')]));

            return redirect(route('movements.index'));
        }

        $this->movementRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/movements.singular')]));

        return redirect(route('movements.index'));
    }
}

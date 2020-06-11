<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoundRequest;
use App\Http\Requests\UpdateRoundRequest;
use App\Repositories\RoundRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoundController extends AppBaseController
{
    /** @var  RoundRepository */
    private $roundRepository;

    public function __construct(RoundRepository $roundRepo)
    {
        $this->roundRepository = $roundRepo;
    }

    /**
     * Display a listing of the Round.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rounds = $this->roundRepository->all();

        return view('rounds.index')
            ->with('rounds', $rounds);
    }

    /**
     * Show the form for creating a new Round.
     *
     * @return Response
     */
    public function create()
    {
        return view('rounds.create');
    }

    /**
     * Store a newly created Round in storage.
     *
     * @param CreateRoundRequest $request
     *
     * @return Response
     */
    public function store(CreateRoundRequest $request)
    {
        $input = $request->all();

        $round = $this->roundRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/rounds.singular')]));

        return redirect(route('rounds.index'));
    }

    /**
     * Display the specified Round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            Flash::error(__('messages.not_found', ['model' => __('models/rounds.singular')]));

            return redirect(route('rounds.index'));
        }

        return view('rounds.show')->with('round', $round);
    }

    /**
     * Show the form for editing the specified Round.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            Flash::error(__('messages.not_found', ['model' => __('models/rounds.singular')]));

            return redirect(route('rounds.index'));
        }

        return view('rounds.edit')->with('round', $round);
    }

    /**
     * Update the specified Round in storage.
     *
     * @param int $id
     * @param UpdateRoundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoundRequest $request)
    {
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            Flash::error(__('messages.not_found', ['model' => __('models/rounds.singular')]));

            return redirect(route('rounds.index'));
        }

        $round = $this->roundRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/rounds.singular')]));

        return redirect(route('rounds.index'));
    }

    /**
     * Remove the specified Round from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            Flash::error(__('messages.not_found', ['model' => __('models/rounds.singular')]));

            return redirect(route('rounds.index'));
        }

        $this->roundRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/rounds.singular')]));

        return redirect(route('rounds.index'));
    }
}

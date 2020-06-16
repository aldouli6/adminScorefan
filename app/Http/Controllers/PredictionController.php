<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePredictionRequest;
use App\Http\Requests\UpdatePredictionRequest;
use App\Repositories\PredictionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PredictionController extends AppBaseController
{
    /** @var  PredictionRepository */
    private $predictionRepository;

    public function __construct(PredictionRepository $predictionRepo)
    {
        $this->predictionRepository = $predictionRepo;
    }

    /**
     * Display a listing of the Prediction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $predictions = $this->predictionRepository->all();

        return view('predictions.index')
            ->with('predictions', $predictions);
    }

    /**
     * Show the form for creating a new Prediction.
     *
     * @return Response
     */
    public function create()
    {
        return view('predictions.create');
    }

    /**
     * Store a newly created Prediction in storage.
     *
     * @param CreatePredictionRequest $request
     *
     * @return Response
     */
    public function store(CreatePredictionRequest $request)
    {
        $input = $request->all();

        $prediction = $this->predictionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/predictions.singular')]));

        return redirect(route('predictions.index'));
    }

    /**
     * Display the specified Prediction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            Flash::error(__('messages.not_found', ['model' => __('models/predictions.singular')]));

            return redirect(route('predictions.index'));
        }

        return view('predictions.show')->with('prediction', $prediction);
    }

    /**
     * Show the form for editing the specified Prediction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            Flash::error(__('messages.not_found', ['model' => __('models/predictions.singular')]));

            return redirect(route('predictions.index'));
        }

        return view('predictions.edit')->with('prediction', $prediction);
    }

    /**
     * Update the specified Prediction in storage.
     *
     * @param int $id
     * @param UpdatePredictionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePredictionRequest $request)
    {
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            Flash::error(__('messages.not_found', ['model' => __('models/predictions.singular')]));

            return redirect(route('predictions.index'));
        }

        $prediction = $this->predictionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/predictions.singular')]));

        return redirect(route('predictions.index'));
    }

    /**
     * Remove the specified Prediction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            Flash::error(__('messages.not_found', ['model' => __('models/predictions.singular')]));

            return redirect(route('predictions.index'));
        }

        $this->predictionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/predictions.singular')]));

        return redirect(route('predictions.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMethodRequest;
use App\Http\Requests\UpdateMethodRequest;
use App\Repositories\MethodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MethodController extends AppBaseController
{
    /** @var  MethodRepository */
    private $methodRepository;

    public function __construct(MethodRepository $methodRepo)
    {
        $this->methodRepository = $methodRepo;
    }

    /**
     * Display a listing of the Method.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $methods = $this->methodRepository->all();

        return view('methods.index')
            ->with('methods', $methods);
    }

    /**
     * Show the form for creating a new Method.
     *
     * @return Response
     */
    public function create()
    {
        return view('methods.create');
    }

    /**
     * Store a newly created Method in storage.
     *
     * @param CreateMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateMethodRequest $request)
    {
        $input = $request->all();

        $method = $this->methodRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/methods.singular')]));

        return redirect(route('methods.index'));
    }

    /**
     * Display the specified Method.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            Flash::error(__('messages.not_found', ['model' => __('models/methods.singular')]));

            return redirect(route('methods.index'));
        }

        return view('methods.show')->with('method', $method);
    }

    /**
     * Show the form for editing the specified Method.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            Flash::error(__('messages.not_found', ['model' => __('models/methods.singular')]));

            return redirect(route('methods.index'));
        }

        return view('methods.edit')->with('method', $method);
    }

    /**
     * Update the specified Method in storage.
     *
     * @param int $id
     * @param UpdateMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMethodRequest $request)
    {
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            Flash::error(__('messages.not_found', ['model' => __('models/methods.singular')]));

            return redirect(route('methods.index'));
        }

        $method = $this->methodRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/methods.singular')]));

        return redirect(route('methods.index'));
    }

    /**
     * Remove the specified Method from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            Flash::error(__('messages.not_found', ['model' => __('models/methods.singular')]));

            return redirect(route('methods.index'));
        }

        $this->methodRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/methods.singular')]));

        return redirect(route('methods.index'));
    }
}

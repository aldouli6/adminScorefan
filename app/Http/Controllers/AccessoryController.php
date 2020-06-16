<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessoryRequest;
use App\Http\Requests\UpdateAccessoryRequest;
use App\Repositories\AccessoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AccessoryController extends AppBaseController
{
    /** @var  AccessoryRepository */
    private $accessoryRepository;

    public function __construct(AccessoryRepository $accessoryRepo)
    {
        $this->accessoryRepository = $accessoryRepo;
    }

    /**
     * Display a listing of the Accessory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $accessories = $this->accessoryRepository->all();

        return view('accessories.index')
            ->with('accessories', $accessories);
    }

    /**
     * Show the form for creating a new Accessory.
     *
     * @return Response
     */
    public function create()
    {
        return view('accessories.create');
    }

    /**
     * Store a newly created Accessory in storage.
     *
     * @param CreateAccessoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAccessoryRequest $request)
    {
        $input = $request->all();

        $accessory = $this->accessoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accessories.singular')]));

        return redirect(route('accessories.index'));
    }

    /**
     * Display the specified Accessory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accessories.singular')]));

            return redirect(route('accessories.index'));
        }

        return view('accessories.show')->with('accessory', $accessory);
    }

    /**
     * Show the form for editing the specified Accessory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accessories.singular')]));

            return redirect(route('accessories.index'));
        }

        return view('accessories.edit')->with('accessory', $accessory);
    }

    /**
     * Update the specified Accessory in storage.
     *
     * @param int $id
     * @param UpdateAccessoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccessoryRequest $request)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accessories.singular')]));

            return redirect(route('accessories.index'));
        }

        $accessory = $this->accessoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accessories.singular')]));

        return redirect(route('accessories.index'));
    }

    /**
     * Remove the specified Accessory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accessories.singular')]));

            return redirect(route('accessories.index'));
        }

        $this->accessoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accessories.singular')]));

        return redirect(route('accessories.index'));
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAccessoryAPIRequest;
use App\Http\Requests\API\UpdateAccessoryAPIRequest;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\Team;
use App\User;
use App\Repositories\AccessoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use Response;

/**
 * Class AccessoryController
 * @package App\Http\Controllers\API
 */

class AccessoryAPIController extends AppBaseController
{
    /** @var  AccessoryRepository */
    private $accessoryRepository;

    public function __construct(AccessoryRepository $accessoryRepo)
    {
        $this->accessoryRepository = $accessoryRepo;
    }

    /**
     * Display a listing of the Accessory.
     * GET|HEAD /accessories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $accessories = $this->accessoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $accessories->toArray(),
            __('messages.retrieved', ['model' => __('models/accessories.plural')])
        );
    }

    /**
     * Store a newly created Accessory in storage.
     * POST /accessories
     *
     * @param CreateAccessoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAccessoryAPIRequest $request)
    {
        $input = $request->all();

        $accessory = $this->accessoryRepository->create($input);

        return $this->sendResponse(
            $accessory->toArray(),
            __('messages.saved', ['model' => __('models/accessories.singular')])
        );
    }

    /**
     * Display the specified Accessory.
     * GET|HEAD /accessories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Accessory $accessory */
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accessories.singular')])
            );
        }

        return $this->sendResponse(
            $accessory->toArray(),
            __('messages.retrieved', ['model' => __('models/accessories.singular')])
        );
    }

    /**
     * Update the specified Accessory in storage.
     * PUT/PATCH /accessories/{id}
     *
     * @param int $id
     * @param UpdateAccessoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccessoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var Accessory $accessory */
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accessories.singular')])
            );
        }

        $accessory = $this->accessoryRepository->update($input, $id);

        return $this->sendResponse(
            $accessory->toArray(),
            __('messages.updated', ['model' => __('models/accessories.singular')])
        );
    }

    /**
     * Remove the specified Accessory from storage.
     * DELETE /accessories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Accessory $accessory */
        $accessory = $this->accessoryRepository->find($id);

        if (empty($accessory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/accessories.singular')])
            );
        }

        $accessory->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/accessories.singular')])
        );
    }
    public function myAccesoriesFromCategory(Request $request)
    {
        $accessories = Accessory::where('user_id',$request->user_id)
                    ->where('category_id',$request->category_id)
                    ->get();
        foreach ($accessories as $key => $accessory) {
            $accessory['product_name']=Product::find($accessory['product_id'])->name;
        }
        $response= $accessories;
        return $this->sendResponse(
            $response,
            __('messages.retrieved', ['model' => __('models/accessories.plural')])
        );
    }
    public function guardarPerfil(Request $request)
    {
        $datas=$request->all();
        foreach ($datas as $key => $value) {
            Accessory::where('category_id',$value['categoria'] )
            ->where('user_id', $value['user_id'])
            ->update(['selected' => false]);
            Accessory::where('product_id',$value['producto'] )
            ->update(['selected' => true]);
        }
        return $this->sendResponse(
            'Se guardaron los accesorios al avar',
            __('messages.retrieved', ['model' => __('models/accessories.plural')])
        );
    }
    public function uploadImage(Request $request) 
	{
        // $validator = Validator::make($request->all(), [
        //     'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        //  ]);
        //  if ($validator->fails()) {
            
        //     return $this->sendResponse(
        //         $validator->messages()->first(),
        //         'error', '500'
        //     );
        //  }
        // dd($request);
         $uploadFolder = 'avatars';
         $image = $request->file('image');
        //  return json_encode($request->file('image'));
         $save_path = storage_path().'/app/public/avatars/';
         $image->move($save_path, $request->name.'.png');
        //  $image_uploaded_path = $image->store/($uploadFolder, 'public');
        //  $uploadedImageResponse = array(
        //     "image_name" => basename($image_uploaded_path),
        //     "image_url" => Storage::disk('public')->url($image_uploaded_path),
        //     "mime" => $image->getClientMimeType()
        //  );
         return $this->sendResponse(
            $save_path,
            'success', '200'
        );
         
        // // dd($req/uest->file);
        // $file=$request->file;
	    // $save_path = storage_path().'/app/public/avatars/';
	    // $nombre='avatar_'.$request->user_id.'.png';
	    // if (file_exists($save_path)) {
		// 	//echo El directorio existe”;
		// 	file_put_contents($save_path.$nombre, $file);
		// } else {
		// 	mkdir($save_path, 0777, true);
		// 	file_put_contents($save_path.$nombre, $file);
		// }
	    // return $save_path.$nombre;
	}
    public function resumenPerfil(Request $request)
    {
        $user = User::find($request->user_id, ['team_id', 'balance']);
        $user['team'] =  Team::find($user->team_id)->name;
        $response= $user;
        return $this->sendResponse(
            $response,
            __('messages.retrieved', ['model' => __('models/accessories.plural')])
        );
    }
}

<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\AboutBaseInterface;
use App\Http\Requests\About\DeleteUserAboutRequest;
use App\Http\Requests\About\GetUserAboutRequest;
use App\Http\Requests\About\StoreUserAboutRequest;
use App\Transformer\GetUserAboutTransformer;
use Illuminate\Http\JsonResponse;

class AboutController
{
    public function __construct(private readonly  AboutBaseInterface $repository){}

    /**
     * @param GetUserAboutRequest $request
     * @return JsonResponse
     */
    public function getUserAbout(GetUserAboutRequest $request): JsonResponse
    {
        $data = $this->repository->getUserAbout($request->client_id);
        return response()->json(GetUserAboutTransformer::transform($data), 200);
    }

    /**
     * @param GetUserAboutRequest $request
     * @return JsonResponse
     */
    public function getUserAbout2(GetUserAboutRequest $request): JsonResponse
    {
        return response()->json($this->repository->getUserAbout2($request->user_id), 200);
    }

    /**
     * @param StoreUserAboutRequest $request
     * @return JsonResponse
     */
    public function storeUserAbout(StoreUserAboutRequest $request): JsonResponse
    {
        return response()->json($this->repository->storeUserAbout($request), 200);
    }

    /**
     * @param DeleteUserAboutRequest $request
     * @return JsonResponse
     */
    public function deleteUserAbout(DeleteUserAboutRequest $request): JsonResponse
    {
        return response()->json(['status'=> $this->repository->deleteUserAbout($request->user_id)], 200);
    }

}

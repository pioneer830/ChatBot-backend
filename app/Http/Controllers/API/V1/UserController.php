<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\UserInterface;
use App\Http\Requests\About\DeleteUserAboutRequest;
use App\Http\Requests\About\GetUserAboutRequest;
use App\Http\Requests\About\StoreUserAboutRequest;
use App\Http\Requests\UserPlansRequest;
use App\Transformer\GetUserAboutTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    public function __construct(private readonly  UserInterface $repository){}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function setDefaultPlan(UserPlansRequest $request): JsonResponse
    {
        info(['message'=>$request]);
        $response = $this->repository->setPlan($request);
        return response()->json($response, 200);
    }

}

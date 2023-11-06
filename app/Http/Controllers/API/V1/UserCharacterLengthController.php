<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\CharacterLengthBaseInterface;
use App\Http\Requests\CharacterLength\AddCharacterLengthRequest;
use App\Http\Requests\CharacterLength\DeleteCharacterLengthRequest;
use App\Http\Requests\CharacterLength\GetUserCharacterLengthRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCharacterLengthController
{

    public function __construct(private readonly CharacterLengthBaseInterface $repository){}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllCharacterLength(Request $request): JsonResponse
    {
        return response()->json([ 'character_length' => $this->repository->getAllCharacterLength()], 200);
    }

    /**
     * @param GetUserCharacterLengthRequest $request
     * @return JsonResponse
     */
    public function getUserCharacterLength(GetUserCharacterLengthRequest $request): JsonResponse
    {
        return response()->json($this->repository->getUserCharacterLength($request), 200);
    }

    /**
     * @param AddCharacterLengthRequest $request
     * @return JsonResponse
     */
    public function addUserCharacterLength(AddCharacterLengthRequest $request): JsonResponse
    {
        return response()->json($this->repository->addUserCharacterLength($request), 201);
    }

    /**
     * @param DeleteCharacterLengthRequest $request
     * @return JsonResponse
     */
    public function deleteUserCharacterLength(DeleteCharacterLengthRequest $request): JsonResponse
    {
        return response()->json([
            'status' => $this->repository->deleteUserCharacterLength($request)
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function getAllCharacterLengthView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.char_length.list-of-character-length', ['character_length' => $this->repository->getAllCharacterLength()]);
    }

    /**
     * @param Request $request
     * @return Application|View|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function getUserCharacterLengthView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.char_length.user-character-length',  [
            'char_lengths' => $this->repository->getUserCharacterLengthByUserId($user->id),
            'user' => $user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function getUserCharacterLengthForm(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view("user.char_length.create", [
            'character_lengths' => $this->repository->getAllCharacterLength(),
            'user' =>$user
        ]);
    }
}

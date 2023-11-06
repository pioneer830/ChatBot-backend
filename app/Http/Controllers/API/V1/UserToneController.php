<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\ToneBaseInterface;
use App\Http\Requests\Tones\AddToneRequest;
use App\Http\Requests\Tones\DeleteToneRequest;
use App\Http\Requests\Tones\GetUserToneRequest;
use App\Http\Requests\Tones\ToneIntentionStatusRequest;
use App\Service\ExtensionService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserToneController
{

    public function __construct(private readonly ToneBaseInterface $repository){}

    /**
     * @param ToneIntentionStatusRequest $request
     * @return JsonResponse
     */
    public function toneIntentionStatus(ToneIntentionStatusRequest $request): JsonResponse
    {
        return response()->json($this->repository->toneIntentionStatus($request), 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllTone(Request $request): JsonResponse
    {
        return response()->json(['tones' => $this->repository->getAllTone(10)], 200);
    }

    /**
     * @param GetUserToneRequest $request
     * @return JsonResponse
     */
    public function getUserTone(GetUserToneRequest $request): JsonResponse
    {
        return response()->json($this->repository->getUserTone($request), 200);
    }

    /**
     * @param AddToneRequest $request
     * @return JsonResponse
     */
    public function addUserTone(AddToneRequest $request)
    {
        if (!isPro()) {
            return redirect()->route('plans');
        }

        $insertedData = $this->repository->addUserTone($request);
        $extension = "";
        if(!empty($insertedData)) {
            ExtensionService::removeExtensionSession(ExtensionService::TONE_USER_SESSION_KEY);
            $extension = ExtensionService::getExtensionValues();
        }

        $response = [
            'insertedData' => $insertedData,
            'updated_extension_values' => $extension,
        ];
        return response()->json(compact('response'), 201);
    }

    /**
     * @param DeleteToneRequest $request
     * @return JsonResponse
     */
    public function deleteUserTone(DeleteToneRequest $request): JsonResponse
    {
        $is_deleted = $this->repository->deleteUserTone($request);
        if($is_deleted){
            ExtensionService::removeExtensionSession(ExtensionService::TONE_USER_SESSION_KEY);
            $extension = ExtensionService::getExtensionValues();
        }

        return response()->json([
            'status' => $is_deleted,
            'updated_extension_values'=>$extension
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function getAllToneView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.tones.list-of-tones', ['tones' => $this->repository->getAllTone()]);
    }

    /**
     * @param Request $request
     * @return Application|View|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function getUserToneView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.tones.user-tone',  [
            'user_tones' => $this->repository->getUserToneByUserId($user->id),
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     */
    public function getUserToneForm(Request $request)
    {
        if (!isPro()) {
            return redirect()->route('plans');
        }
        $userTone = [];
        $user = Auth::user();

        $userTones = $this->repository->getUserToneByUserId($user->id)->toArray();
        foreach ($userTones as $tone){
            $userTone[] = $tone['tone']['name'] ?? "";
        }
        $this->repository->getUserToneByUserId($user->id);
        return view("user.tones.create", [
            'tones' => $this->repository->getAllTone(),
            'user' => $user,
            'user_tone' => $userTone
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function insertMultiTones(Request $request): JsonResponse
    {
        $this->repository->insertMultiTones($request);
        return response()->json(['status' => 'Done inserting'], 200);
    }
}

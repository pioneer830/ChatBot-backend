<?php

namespace App\Http\Controllers\API\V1;

use App\Contracts\IntentionBaseInterface;
use App\Http\Requests\Intentions\AddIntentionRequest;
use App\Http\Requests\Intentions\DeleteIntentionRequest;
use App\Http\Requests\Intentions\GetUserIntentionRequest;
use App\Service\ExtensionService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIntentionController
{

    public function __construct(private readonly IntentionBaseInterface $repository)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllIntention(Request $request): JsonResponse
    {
        return response()->json(['intentions' => $this->repository->getAllIntention(10)], 200);
    }

    /**
     * @param GetUserIntentionRequest $request
     * @return JsonResponse
     */
    public function getUserIntention(GetUserIntentionRequest $request): JsonResponse
    {
        return response()->json($this->repository->getUserIntention($request), 200);
    }

    /**
     * @param AddIntentionRequest $request
     * @return JsonResponse
     */
    public function addUserIntention(AddIntentionRequest $request): JsonResponse
    {
        if (!isPro()) {
            return redirect()->route('plans');
        }

        $insertedData = $this->repository->addUserIntention($request);
        $extension = "";
        if(!empty($insertedData)) {
            ExtensionService::removeExtensionSession(ExtensionService::INTENTION_USER_SESSION_KEY);
            $extension = ExtensionService::getExtensionValues();
        }

        $response = [
            'insertedData' => $insertedData,
            'updated_extension_values' => $extension,
        ];

        return response()->json(compact('response'), 201);
    }

    /**
     * @param DeleteIntentionRequest $request
     * @return JsonResponse
     */
    public function deleteUserIntention(DeleteIntentionRequest $request): JsonResponse
    {
        $is_deleted = $this->repository->deleteUserIntention($request);
        if($is_deleted){
            ExtensionService::removeExtensionSession(ExtensionService::INTENTION_USER_SESSION_KEY);
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
    public function getAllIntentionView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.intentions.list-of-intentions', ['intentions' => $this->repository->getAllIntention()]);
    }

    /**
     * @param Request $request
     * @return Application|View|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function getUserIntentionView(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.intentions.user-intention',  [
            'user_intentions' => $this->repository->getUserIntentionByUserId($user->id),
            'user' => $user,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|View|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function getUserIntentionForm(Request $request)
    {
        if (!isPro()) {
            return redirect()->route('plans');
        }

        $userIntent = [];
        $user = Auth::user();
        $userIntentions = $this->repository->getUserIntentionByUserId($user->id)->toArray();

        foreach ($userIntentions as $userIntention){
            $userIntent[] = $userIntention['intention']['name'] ?? "";
        }
        return view("user.intentions.create", [
            'intentions' => $this->repository->getAllIntention(),
            'user' => $user,
            'user_intention' =>$userIntent
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function insertMultiIntentions(Request $request): JsonResponse
    {
        $this->repository->insertMultiIntentions($request);
        return response()->json(['status' => 'Done inserting'], 200);
    }
}

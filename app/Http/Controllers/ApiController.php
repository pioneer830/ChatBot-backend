<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Guest;
use App\Models\User;
use App\Models\UserAuthToken;
use App\Service\ExtensionService;
use App\Utils\ImageToTextConverter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{

    public function getGuestUserContent(){
        return response()->json([
            'data' => json_decode(ExtensionService::getExtensionValues())
        ],200);
    }

    public function getImageToText(ImageRequest $request){
        $file = $request->file('image');
        $image = base64_encode(file_get_contents($file));

        //dd($file);
        $text = (new ImageToTextConverter())
                ->setImagePath($image)
                ->convertImageToText();

        dd($text);
    }

    public function getUserLoginStatusByToken($token)
    {
        $data['is_login'] = 0;
        $data['msg'] = "failed";
        $data['is_paid'] = 0;

        $userObj = (new UserAuthToken())->getUserWithAuthTokenByToken($token);

        if (!empty($userObj)) {
            $data['is_login'] = 1;
            $data['msg'] = "success";
            $data['is_paid'] = !empty($userObj->user->latestSubscription) ? 1 : 0;
        }

        return response()->json(['data' => $data], 200);
    }

    public function guestRegister(Request $request) {
        $client_ip = $request->ip();
        $client_id = Str::random(30).'_'.Carbon::now()->format('YmdHis');
//        if(isset($user) && isset($user->id) && $user->id) {
//            return response()->json(["msg" => "Already Registered", "isRegistered" => ($user->email != null), "isPaid" => false, "count" => $user->remain_count]);
//        }
        Guest::create([
            "client_ip" => $client_ip,
            "remain_count" => 1000,
            "client_id" => $client_id
        ]);
        return response()->json(["msg" => "Register Success.", "count" => 1000, "client_id" => $client_id]);
    }

    public function getStatus(Request $request) {
        $client_id = $request->get('client_id');
        $guest = Guest::where('client_id', $client_id)->first();
        if(isset($guest) && isset($guest->id) && $guest->id) {
            $last_subscription = $guest->user ? $guest->user->lastSubscription() : null;
//            if(isset($last_subscription) && is_object($last_subscription) && isset($last_subscription->plan) && is_object($last_subscription->plan)) {
//                $guest->update([
//                    "remain_count" => $last_subscription->plan->limit_words
//                ]);
//            }
            if(isset($guest->user) && isset($guest->user->id)) {
                return response()->json([
                    "msg" => "logged in.",
                    "count" => $guest->remain_count,
                    "status" => ($last_subscription != null ? "PRO" : "FREE")
                ]);
            }
            return response()->json([
                "msg" => "logged in.",
                "count" => $guest->remain_count,
                "status" => "GUEST"
            ]);
        }
    }

    public function updateStatus(Request $request)
    {
        $client_id = $request->get('client_id');
        $user = Guest::where('client_id', $client_id)->first();
        if(isset($user) && isset($user->id) && $user->id) {
            $user->remain_count = $request->get('remain_count', $user->remain_count -1);
            $user->save();
            return response()->json(["msg" => "Update Success.", "count" => $user->remain_count]);
        }
        return response()->json(["msg" => "Update Failed."]);
    }

    public function userLogin(Request $request)
    {
        $client_ip = $request->ip();

        $client_id = Str::random(30).'_'.Carbon::now()->format('YmdHis');
        if($request->get('clientId')) {
            $guest = Guest::where('client_id', $request->get('clientId'))->first();
        }

        $user = User::where('email', $request->get('email'))->first();
        if($user != null) {
            if(isset($guest) && isset($guest->id) && $guest->user_id == null) {
                $guest->update([
                    "user_id" => $user->id
                ]);
            } else {
                $guest = Guest::where('user_id', $user->id)->first();
            }
            if($guest != null) {
                return response()->json(["msg" => "success", "client_id" => $guest->client_id, "count" => $guest->remain_count,
                    "paid" => ($user->lastSubscription() != null)]);
            }
            $count = 1000;
            $last_sub = $user->lastSubscription();
            if(isset($last_sub) && isset($last_sub->plan) && isset($last_sub->plan->limit_words)) {
                $count = $last_sub->plan->limit_words;
            }
            Guest::create([
                "client_ip" => $client_ip,
                "remain_count" => $count,
                "client_id" => $client_id,
                "user_id" => $user->id
            ]);
            return response()->json([
                "msg" => "success",
                "client_id" => $client_id,
                "count" => $count,
                "paid" => ($user->lastSubscription() != null)
            ]);
        }
        return response()->json(["msg" => "failed"]);
    }

    public function updateUserData(Request $request, User $user)
    {
        if($request->has('password') && $request->get('password')) {
            $oldPassword = $request->get('old_password');
            $password = $request->get('password');
            if(Hash::check($oldPassword, $user->password)) {
                if($user->update([
                    "password" => Hash::make($password)
                ])) {
                    return response()->json(['msg' => 'success']);
                } else {
                    return response()->json(['msg' => 'Failed.']);
                }
            } else {
                return response()->json(['msg' => "Please input correct old password."]);
            }
        } else {
            if($user->update($request->all())) {
                return response()->json(['msg' => 'success']);
            } else {
                return response()->json(['msg' => 'Failed.']);
            }
        }
    }

    public function validEmailCheck(Request $request) {
        $user = User::whereNotNull('email');
        if($request->has('user_id') && $request->get('user_id')) {
            $user->where('id', '<>', $request->get('user_id'));
        }
        if($user->where('email', $request->get('email'))->count() > 0) {
            return response()->json(["result" => false]);
        }
        return response()->json(["result" => true]);
    }
}

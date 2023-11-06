<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\LoginBaseInterface;
use App\Helper\DefaultTonesAndIntentions;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\User;
use App\Models\UserAuthToken;
use App\Providers\RouteServiceProvider;
use App\Service\ExtensionService;
use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private readonly LoginBaseInterface $repository)
    {
        $this->middleware('guest')->except(['logout','getAuthorizeUser']);
    }


    public function getAuthorizeUser($unique_id){
        $is_executed = session()->get('is_auth_token_created') ?? false;
        $user = auth()->user() ?? [];
        if(!empty($user) && $unique_id && !$is_executed) {

            $user_id = $user->id;
            $userAuthToken = new UserAuthToken();

            $userAuthToken->deleteByUserId($user_id);

            $inputData['user_id'] = $user_id;
            $inputData['token'] = $unique_id;
            $inputData['token_expiry'] = getSessionLifeTime();

            $userAuthToken->add($inputData);
            session()->put('is_auth_token_created',true);
            return response()->json(['data'=>$user,'unique_id'=>$unique_id],200);
        }

        return response()->json(['data'=>$user],200);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        session()->forget('auth_user_plan');

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     * @param $user
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return $this->repository->authenticated($user);
    }

    /**
     * @return void
     */
    public function deleteGuests(): void
    {
        $this->repository->deleteGuests();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
     */
    public function logout(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        (new UserAuthToken())->deleteByUserId(auth()->id());
        $this->repository->logout();
        session()->forget('auth_user_plan');
        session()->forget('is_auth_token_created');
        removePlanIdSession();
        ExtensionService::removeAllSession();
        return redirect('/login');
    }

    /**
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function googleLogin(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function googleCallback(): RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->to('home')->with('isSocialLogin', true);
            }

            list($firstName, $lastName) = $this->splitName($user);
            $newUser = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('12345678'),
                'status' => 'active',
            ]);

            $newUser->addRole('user');

            Helper::setDefaultPlan($newUser->id);
            DefaultTonesAndIntentions::defaultInsert($newUser->id, 'tone');
            DefaultTonesAndIntentions::defaultInsert($newUser->id, 'intention');

            Auth::login($newUser);

            return redirect()->intended('home')->with('isSocialLogin', true);

        } catch (\Exception $e) {
            return redirect()->to('login')->with('error', 'Something went wrong, please try again');
        }

        return $this->repository->googleCallback();
    }

    /**
     * @param $user
     * @return array
     */
    private function splitName($user): array
    {
        $first_name = '';
        $last_name = '';
        try {
            if (isset($user->user)) {
                if (isset($user->user['given_name'])) {
                    $first_name = $user->user['given_name'];
                }
                if (isset($user->user['family_name'])) {
                    $last_name = $user->user['family_name'];
                } else {
                    $names = explode(' ', $user->name ?? '');
                    $first_name = $names[0] ?? $user?->name;
                    $last_name = $names[1] ?? '';
                }
            } else {
                $names = explode(' ', $user->name ?? '');
                $first_name = $names[0] ?? $user?->name;
                $last_name = $names[1] ?? '';
            }

            return [
                $first_name,
                $last_name
            ];
        } catch(\Exception $e) {
            $names = explode(' ', $user->name ?? '');
            return [
                $names[0] ?? $user?->name,
                $names[1] ?? ''
            ];
        }
    }

}

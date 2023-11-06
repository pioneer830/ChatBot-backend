<?php

namespace App\Service;

use App\Contracts\LoginServiceInterface;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginService implements LoginServiceInterface
{

    /**
     * @param $user
     * @return RedirectResponse
     */
    public function authenticated($user): RedirectResponse
    {
        if ($url = session()->pull('url.intended')) {
            return redirect()->intended($url);
        }
        if($user->id == 1) {
            return redirect()->route("admin.index");
        }
        return redirect()->route("home");
    }

    /**
     * @return mixed
     */
    public function deleteGuests(): mixed
    {
        return Guest::where('user_id', Auth::user()->id)->delete();
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        //$this->deleteGuests();
        Auth::logout();
        return true;
    }

    /**
     * @return RedirectResponse
     */
    public function googleCallback(): RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->to('home')->with('isSocialLogin', true);
            }

            $newUser = User::create([
                'first_name' => $user->name,
                'last_name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('12345678'),
                'status' => 'active',
            ]);

            /*$newUser = new User();
            $newUser->first_name = $user->name;
            $newUser->last_name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = encrypt('12345678');
            $newUser->google_ids = $user->id;
            $newUser->status = 'active';*/

            $newUser->addRole('user');

            Auth::login($newUser);

            return redirect()->intended('home')->with('isSocialLogin', true);

        } catch (\Exception $e) {
            return redirect()->to('login')->with('error', 'Something went wrong, please try again');
        }
    }

}

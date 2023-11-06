<?php

namespace App\Service;

use App\Contracts\RegisterServiceInterface;
use App\Helper\DefaultTonesAndIntentions;
use App\Helper\Helper;
use App\Mail\RegisterEmail;
use App\Models\Job;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterService implements RegisterServiceInterface
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;
    /**
     * @return Collection
     */
    public function getAllJobs(): Collection
    {
        return Job::all();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
           // 'job_title' => ['required', 'string', 'max:255'],
            //'job_description' => 'required',
            //'industry' => ['required', 'string', 'max:255'],
//            'industry_description' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'job_title' => $data['job_title'],
            //'job_description' => $data['job_description'],
            //'industry' => $data['industry'],
//            'industry_description' => $data['industry_description'],
            'client_ip' => $data['client_ip'],
            //'client_id' => $data['client_id'],
        ]);
    }

    /**
     * @param $request
     * @return Application|\Illuminate\Foundation\Application|JsonResponse|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function register($request): \Illuminate\Foundation\Application|JsonResponse|Redirector|RedirectResponse|Application
    {
        $inputData['first_name'] = $request->first_name;
        $inputData['last_name'] = $request->last_name;
        $inputData['email'] = $request->email;
        $inputData['password'] = $request->password;
        $inputData['client_ip'] = $request->ip();
        $this->validator($inputData)->validate();

        event(new Registered($user = $this->create($inputData)));

        Helper::setDefaultPlan($user->id);
        DefaultTonesAndIntentions::defaultInsert($user->id, 'tone');
        DefaultTonesAndIntentions::defaultInsert($user->id, 'intention');

        $this->sendEmail($request);

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * @param $request
     * @return void
     */
    private function sendEmail($request): void
    {
        try {
            Mail::to($request->email)->send(new RegisterEmail($request));
        } catch (\Exception $e) {
            report($e);
        }
    }


}

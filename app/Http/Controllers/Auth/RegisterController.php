<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\HomeBaseInterface;
use App\Contracts\RegisterBaseInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private readonly RegisterBaseInterface $repository, private readonly HomeBaseInterface $homeRepository)
    {
        $this->middleware('guest');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function getAllJobs(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $jobs = $this->repository->getAllJobs();
        return view('auth/register', compact($jobs));
    }

    /**
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.register', [
            'jobs' => $this->homeRepository->getAllJob(),
            'industries' => $this->homeRepository->getAllIndustry(),
            'client_ip' => $request->ip(),
            'client_id' => $request->get('client_id', Str::random(30))
        ]);
    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Foundation\Application|JsonResponse|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function register(Request $request): \Illuminate\Foundation\Application|JsonResponse|Redirector|RedirectResponse|Application
    {
        return $this->repository->register($request);
    }
}

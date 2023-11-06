<?php

namespace App\Service;

use App\Contracts\AboutInterface;
use App\Models\About;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AboutService implements AboutInterface
{
    private About $about;
    private User $user;

    public function __construct()
    {
        $this->about = new About();
        $this->user = new User();
    }

    /**
     * @param $clientId
     * @return Model|Builder|null
     */
    public function getUserAbout($clientId): Model|Builder|null
    {
        return $this->user::with('user_industry', 'job')
            ->where('id', function($query) use ($clientId) {
                $query->select("user_id")->from('guests')->where('client_id', $clientId);
            })
            ->first();

    }

    public function getUserAbout2($userId)
    {
        return $this->about::with('industry')->where('user_id', $userId)->first();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function storeUserAbout($request): mixed
    {
        $aboutAlreadyExist = $this->aboutAlreadyExist($request->user_id);
        if($aboutAlreadyExist){
            return $this->updateAboutYou($aboutAlreadyExist, $request);
        }

        return $this->createAboutYou($request);
    }

    /**
     * @param $userId
     * @return mixed
     */
    private function aboutAlreadyExist($userId): mixed
    {
        return $this->about::where('user_id', $userId)->first();
    }

    /**
     * @param $request
     * @return mixed
     */
    private function createAboutYou($request): mixed
    {
        return $this->about::create([
            'job_title' => $request->title,
            'industry_id' => $request->industry_id,
            'user_id' => $request->user_id,
            'job_description' => $request->description
        ]);
    }

    /**
     * @param $about
     * @param $request
     * @return mixed
     */
    private function updateAboutYou($about, $request): mixed
    {
        $about->job_title = $request->title ??  $about->job_title;
        $about->industry_id = $request->industry_id ?? $about->industry_id;
        $about->job_description = $request->description ?? $about->job_description;
        $about->save();

        return $about;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function deleteUserAbout($userId): mixed
    {
        return $this->about::where('user_id', $userId)->delete();
    }
}

<?php

namespace App\Transformer;

class GetUserAboutTransformer
{
    /**
     * @param $data
     * @return array
     */
    public static function transform($data): array
    {
        $result = [];
        if(empty($data)){
            return $result;
        }

        $result['user_name'] = $data?->first_name . " ". $data?->last_name;
        $result['job_title'] = $data->job_title ?? "";
        $result['job_description'] = $data->job_description ?? "";
        $result['industry_description'] = $data->industry_description ?? "";
        $result['industry'] = $data->user_industry->name ?? "";
        return $result;
    }
}

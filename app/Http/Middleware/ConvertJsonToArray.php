<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\TransformsRequest;

class ConvertJsonToArray extends TransformsRequest
{
    /**
     * List of fields that should be converted to array.
     *
     * @var array<string>
     */
    protected $fields = [
        'keywords',    //e.g [{"id": 8310888, "relevance": 0.61, "name": "jobs", "new": true}]
        'keyword_ids', //e.g [8310888, 8315482, 20233178, 6189975, 25490203]
        'params',
        'filters'      //e.g {"exclude_filter":["romania","local"],"context_website":["jumia.com"]}
    ];

    /**
     * Transform the given value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function transform($key, $value)
    {
        if (!in_array($key, $this->fields, true)) {
            return $value;
        }

        if (in_array($key, $this->fields)
            && (empty($value) || is_null($value))
        ) {
            return [];
        }

        return json_decode($value, true);
    }
}

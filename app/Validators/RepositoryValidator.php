<?php

namespace App\Validators;

use Illuminate\Http\Exceptions\HttpResponseException;

class RepositoryValidator
{
    /**
     * @param $message
     * @return void
     */
    public static function error($message): void
    {
        $errorResponse = response()->json([
            'error' => 'Something went wrong',
            'message' => $message,
        ], 422);

        self::throw($errorResponse);
    }

    /**
     * @param $error
     * @return mixed
     */
    public static function throw($error): mixed
    {
        throw new HttpResponseException($error);
    }


}

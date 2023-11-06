<?php

namespace App\Validators;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class ValidatorResponse
{
    /**
     * @param $errors
     * @param $code
     * @return void
     */
    public static function validationErrors($errors, $code): void
    {
        $errorResponse = response()->json([
            'error' => $errors,
        ], $code);

        RepositoryValidator::throw($errorResponse);
    }

    /**
     * @param $error
     * @param $code
     * @return mixed
     */
    public static function validationFirstErrors($error, $code): mixed
    {
        //{"message":"The tone id field is required.","errors":{"tone_id":["The tone id field is required."]}}
        $errorResponse = response()->json([
            'errors' => $error,
        ], $code);

        return RepositoryValidator::throw($errorResponse);
    }

    /**
     * @param $type
     * @return mixed
     */
    public static function maximumError($type): mixed
    {
        $error = Validator::make([], []);
        $errors = $error->errors()->add('message', "maximum {$type} reached");
        return self::validationFirstErrors($errors, 422);
    }
}

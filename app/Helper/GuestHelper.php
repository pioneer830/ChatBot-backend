<?php

namespace App\Helper;

use App\Contracts\GuestHelperInterface;
use App\Models\Guest;

class GuestHelper implements  GuestHelperInterface
{

    /**
     * @param $clientId
     * @return mixed
     */
    public static function getClientId($clientId): mixed
    {
        return Guest::where('client_id', $clientId)->first();
    }

}

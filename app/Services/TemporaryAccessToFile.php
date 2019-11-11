<?php

namespace App\Services;

use App\Token;

class TemporaryAccessToFile
{

    /**
     * @param $temporary_token
     * @return bool|Token
     */

    public function getToken($temporary_token)
    {
        $token = Token::query()->with('file')->where([
            ['temporary_token', '=', $temporary_token],
            ['active', '=', 1]
        ])->first();

        if ($token) {
            return $token;
        }

        return false;
    }


}

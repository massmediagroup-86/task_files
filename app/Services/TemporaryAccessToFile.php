<?php

namespace App\Services;

use App\Token;

class TemporaryAccessToFile
{

    /**
     * @param $temporary_token
     * @return bool|App\Token
     */
    public function getToken(string $temporary_token)
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

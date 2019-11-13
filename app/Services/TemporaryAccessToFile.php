<?php

namespace App\Services;

use App\Token;

class TemporaryAccessToFile
{

    /**
     * @param $temporary_token
     * @return bool|\App\Token
     */
    public function getToken(string $temporary_token): ?Token
    {
        $token = Token::query()
            ->with('file')
            ->where('temporary_token', $temporary_token)
            ->where('active', 1)
            ->first();

        return $token;
    }


}

<?php

namespace App\Services;

use App\Token;

use App\Services\ManageUserFile;
use App\UserFile;

class TemporaryAccessToFile
{

    /**
     * @param $temporary_token
     * @return bool|UserFile
     */

    public function getFile($temporary_token)
    {
        $token = Token::query()->with('file')->where([
            ['temporary_token', '=', $temporary_token],
            ['active', '=', 1]
        ])->first();

        if ($token) {
            $file = $token->file;
            if (!$file) {
                return false;
            }

            $token->active = 0;
            $token->save();

            return $file;
        }

        return false;
    }


}

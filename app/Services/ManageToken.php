<?php

namespace App\Services;

use App\Token;
use App\UserFile;

class ManageToken
{
    /**
     *
     * @return string
     */

    protected function generateToken()
    {
        return sha1(rand() . time());
    }


    /**
     * @param UserFile $userFile
     * @return bool
     */

    public function createToken(UserFile $userFile)
    {
        $token = new Token();
        $token->user_file_id = $userFile->id;
        $token->temporary_token = $this->generateToken();
        return $token->save();
    }


}

<?php

namespace App\Services;

use App\Token;
use App\UserFile;
use Illuminate\Support\Str;

class ManageToken
{
    private function generateToken(): string
    {
        return Str::uuid();
    }

    public function createToken(UserFile $userFile): bool
    {
        $token = new Token();
        $token->user_file_id = $userFile->id;
        $token->temporary_token = $this->generateToken();

        return $token->save();
    }
}

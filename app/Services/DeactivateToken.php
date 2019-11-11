<?php

namespace App\Services;

use App\Token;

class DeactivateToken
{
    public function deactivate(Token $token): bool
    {
        $token->active = 0;

        return $token->save();
    }
}

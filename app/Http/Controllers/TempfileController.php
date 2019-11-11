<?php

namespace App\Http\Controllers;

use App\Services\DeactivateToken;
use App\Services\IncrementViewCounts;
use App\Services\TemporaryAccessToFile;

class TempfileController extends Controller
{

    /**
     * @param IncrementViewCounts $incrementViewCounts
     * @param TemporaryAccessToFile $temporaryAccessToFile ,
     * @param DeactivateToken $deactivateToken
     * @param string $temporary_token
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function file(
        IncrementViewCounts $incrementViewCounts,
        TemporaryAccessToFile $temporaryAccessToFile,
        DeactivateToken $deactivateToken,
        string $temporary_token
    ) {
        $token = $temporaryAccessToFile->getToken($temporary_token);

        if (!$token || !$token->file) {
            abort(404);
        }

        $incrementViewCounts->increment($token->file);
        $deactivateToken->deactivate($token);

        return view('tempfiles.item', ['file' => $token->file]);
    }

}

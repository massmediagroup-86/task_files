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
     * @param string $temporaryToken
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function file(
        IncrementViewCounts $incrementViewCounts,
        TemporaryAccessToFile $temporaryAccessToFile,
        DeactivateToken $deactivateToken,
        string $temporaryToken
    ) {
        $token = $temporaryAccessToFile->getToken($temporaryToken);

        if (!$token || !$token->file) {
            abort(404);
        }

        $incrementViewCounts->increment($token->file);
        $deactivateToken->deactivate($token);

        return view('tempfiles.item', ['file' => $token->file]);
    }

}

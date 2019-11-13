<?php

namespace App\Http\Controllers;

use App\Services\IncrementViewCounts;
use App\UserFile;

class ShowfileController extends Controller
{

    /**
     * @param IncrementViewCounts $incrementViewCounts
     * @param string $permanentToken
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function file(IncrementViewCounts $incrementViewCounts, string $permanentToken)
    {
        $file = UserFile::query()->where('permanent_token', '=', $permanentToken)->first();
        if (!$file) {
            abort(404);
        }
        $this->authorize('view', $file);
        $incrementViewCounts->increment($file);

        return view('showfiles.item', ['file' => $file]);
    }
}

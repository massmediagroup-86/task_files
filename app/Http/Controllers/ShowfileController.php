<?php

namespace App\Http\Controllers;

use App\Services\ManageUserFile;
use App\Services\IncrementViewCounts;
use App\UserFile;
use Illuminate\Http\Request;


class ShowfileController extends Controller
{

    /**
     * @param IncrementViewCounts $incrementViewCounts
     * @param string $permanent_token
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function file(IncrementViewCounts $incrementViewCounts, string $permanent_token)
    {
        $file = UserFile::query()->where('permanent_token', '=', $permanent_token)->first();
        if (!$file) {
            abort(404);
        }
        $this->authorize('view', $file);
        $incrementViewCounts->increment($file);

        return view('showfiles.item', ['file' => $file]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\IncrementViewCounts;
use App\Services\TemporaryAccessToFile;
use App\UserFile;
use Illuminate\Http\Request;
use App\Services\ManageUserFile;
use Illuminate\Support\Facades\Cookie;


class TempfileController extends Controller
{

    /**
     * @param IncrementViewCounts $incrementViewCounts
     * @param string $temporary_token
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function file(
        IncrementViewCounts $incrementViewCounts,
        TemporaryAccessToFile $temporaryAccessToFile,
        string $temporary_token
    ) {
        $file = $temporaryAccessToFile->getFile($temporary_token);

        if (!$file) {
            abort(404);
        }

        $incrementViewCounts->increment($file);

        return response()->file(ManageUserFile::storePath($file->file_name));
    }

}

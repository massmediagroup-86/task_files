<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class SaveUserFile
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function save(UploadedFile $file): string
    {
        $name = '';

        if ($file->isValid()) {
            $name = rand() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs(
                'public',
                $name
            );
        }

        return $name;
    }

}

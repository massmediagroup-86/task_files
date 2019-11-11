<?php

namespace App\Services;

use App\UserFile;
use Illuminate\Support\Facades\Storage;

class ManageUserFile
{
    private $saveFile;

    public function __construct(SaveUserFile $saveFile)
    {
        $this->saveFile = $saveFile;
    }

    /**
     * Save new or update existing model
     *
     * @param array $data
     * @param int $user_id
     * @param UserFile|null $userFileModel
     *
     * @return bool
     */

    public function save(
        array $data,
        int $user_id,
        UserFile $userFileModel = null
    ): bool {
        $model = $userFileModel ? $userFileModel : new UserFile();

        $model->name = $data['name'];
        $model->comment = $data['comment'];
        $model->delete_date = $data['delete_date'];

        if (!$userFileModel) {
            $model->permanent_token = $this->generateAccessToken();
            $model->user_id = $user_id;
        }

        $uploadedFileName = $this->saveFile->save($data['file_name']);
        if ($uploadedFileName) {
            $model->file_name = $uploadedFileName;
        }

        return $model->save();
    }


    /**
     * Remove model and user file
     *
     * @param UserFile $userFileModel
     */

    public function removeUserFile(UserFile $userFileModel)
    {
        Storage::disk('public')->delete($userFileModel->file_name);

        return $userFileModel->delete();
    }


    /**
     * Generate random access token for  permanent link
     *
     * @return string
     */

    public function generateAccessToken()
    {
        return sha1(rand() . time());
    }


}

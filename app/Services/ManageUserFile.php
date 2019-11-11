<?php

namespace App\Services;

use App\UserFile;
use App\Contracts\SaveUserFileContract;

class ManageUserFile
{

    /**
     * Save new or update existing model
     *
     * @param SaveUserFileContract $saveFile
     * @param array $data
     * @param int $user_id
     * @param UserFile|null $userFileModel
     *
     * @return bool
     */

    public function save(
        SaveUserFileContract $saveFile,
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

        $uploadedFileName = $saveFile->save();
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
        /* if ($userFileModel->file_name) {
             @unlink(self::storePath($userFileModel->file_name));
         }

         return $userFileModel->delete();*/

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

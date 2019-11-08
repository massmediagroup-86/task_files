<?php
namespace App\Services;
use App\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageUserFile
{

    /**
     * @param string|null $modelFileName
     * @return string
     */

    public static function storePath($modelFileName=null)
    {
        return public_path('/img/'.($modelFileName ? $modelFileName : '') );
    }

    /**
     * Save new or update existing model
     *
     * @param Request $httpRequest
     * @param array $data
     * @param UserFile|null $userFileModel
     *
     * @return bool
     */

    public function save(Request $httpRequest, array $data, UserFile $userFileModel=null)
    {
        $model = $userFileModel ? $userFileModel : new UserFile();

        $model_file_name = $model->file_name;
       // var_dump($data); die();
        $model->name = $data['name'];
        $model->comment = $data['comment'];
        $model->delete_date = $data['delete_date'];
        if(!$userFileModel)
        {
            $model->permanent_token = $this->generateAccessToken();
            $model->user_id = Auth::id();
        }

        if ($httpRequest->hasFile('file_name'))
        {
            if ($httpRequest->file('file_name')->isValid())
            {
                if($model_file_name)
                    @unlink(self::storePath($model_file_name));
                $file = $httpRequest->file('file_name');
                $filename  = time() . '.' . $file->getClientOriginalExtension();
                /*   var_dump($file);
                   var_dump($filename);
                   var_dump(self::storePath());
                   die();*/
                $file->move(self::storePath(),$filename);

                $model->file_name = $filename;
            }


        }
        else
            $model->file_name = $model_file_name;
        return $model->save();
       // return true;
    }


    /**
     * Remove model and user file
     *
     * @param UserFile $userFileModel
     */

    public function removeUserFile(UserFile $userFileModel)
    {
        if($userFileModel->file_name)
        {
            @unlink(self::storePath($userFileModel->file_name));
        }

        return $userFileModel->delete();

    }



    /**
     * Generate random access token for  permanent link
     *
     * @return string
     */

    public function generateAccessToken()
    {
        return sha1(rand().time());
    }


}

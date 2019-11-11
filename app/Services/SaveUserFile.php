<?php

namespace App\Services;

use App\Token;
use  \Illuminate\Http\Request;
use \App\Contracts\SaveUserFileContract;

class SaveUserFile implements SaveUserFileContract
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * @return string|bool
     */
    public function save()
    {
        if ($this->request->hasFile('file_name')) {
            if ($this->request->file('file_name')->isValid()) {
                $name = rand().'_'.time();
                $this->request->file('file_name')->storeAs(
                    'userfiles',$name
                );

                return $name;
            }
        }

        return false;
    }

}

<?php
namespace  App\Services;

use App\Token;

use App\UserFile;

class IncrementViewCounts
{
    public function increment(UserFile $file): bool
    {
       $file->view_count++;

       return $file->save();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $attributes = [
        'active' => 1,
    ];

    public function file()
    {
        return $this->belongsTo(UserFile::class, 'user_file_id', 'id');
    }
}

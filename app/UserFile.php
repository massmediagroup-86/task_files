<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'view_count' => 0,
    ];

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }




}

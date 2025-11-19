<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['comment'];

    function commentable()
    {
        return $this->morphTo();
    }
}

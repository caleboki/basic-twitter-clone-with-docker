<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Likable;

class Tweet extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

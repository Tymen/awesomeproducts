<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shortlinks extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}

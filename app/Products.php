<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

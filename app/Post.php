<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function category()
    {
        $this->belongsToMany(Category::class);
    }
}

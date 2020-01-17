<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, "post_tag", "post_id", "tag_id");
    }
    public function product()
    {
        return $this->hasMany(Products::class);
    }
}

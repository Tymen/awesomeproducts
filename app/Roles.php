<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function user(){
        return $this->belongsToMany(User::class, "user_role", "role_id", "user_id");
    }
}

<?php

namespace App;

class Blog extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

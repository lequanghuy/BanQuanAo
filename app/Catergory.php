<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Catergory extends Model
{
    public static function catergory()
    {
        return static::all();
    }

    public function catergorydetailsclothes()
    {
        return $this->hasMany(CatergoryDetails::class)->clothes();
    }

    public function catergorydetailsshoes()
    {
        return $this->hasMany(CatergoryDetails::class)->shoes();
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }







}

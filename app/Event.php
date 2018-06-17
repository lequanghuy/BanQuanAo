<?php

namespace App;


class Event extends Model
{
    public static function alltargets()
    {
        return static::selectRaw('target')->get();
    }

    public function scopeEventcode($query, $eventcode)
    {
        return $query->where('code', $eventcode);
    }

    public function catergorydetails()
    {
        return $this->hasOne(CatergoryDetails::class);
    }

    public function pricefilter()
    {
        return $this->hasOne(Pricefilter::class);
    }

}

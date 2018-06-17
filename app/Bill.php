<?php

namespace App;


class Bill extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billdetail()
    {
        return $this->hasMany(Billdetail::class);
    }


    public static function maxid()
    {
        return static::selectRaw('max(id) as bill_id')->where('user_id', '=', auth()->user()->id)->get();
    }

    public function scopePending($query)
    {
        return $query->where('status','like', 'pending');
    }

}

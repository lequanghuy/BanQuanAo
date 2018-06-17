<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatergoryDetails extends Model
{
    public function catergory()
    {
        return $this->belongsTo(Catergory::class);
    }

    public function scopeClothes($query)
    {
        return $query->where('code', 'like', 'QA%');
    }

    public function scopeShoes($query)
    {
        return $query->where('code', 'like', 'GD%');
    }

    public function scopeCatid($query, $id)
    {
        return $query->where('catergory_id', $id);
    }

    public function scopeCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function scopeMan($query)
    {
        return $query->where('code', 'like', '%M%');
    }

    public function scopeWoman($query)
    {
        return $query->where('code', 'like', '%N%');
    }

    public static function allcodes()
    {
        return static::selectRaw('code')->get();
    }


}

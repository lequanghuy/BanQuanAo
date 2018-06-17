<?php

namespace App;

use App\Catergory;
use App\CatergoryDetails;
use App\Event;
class Product extends Model
{
    public function scopeClcode($query, $clcodes)
    {
        return $query->where('catergorydetails_code', 'like', $clcodes);
    }

    public function scopeShcode($query, $shcodes)
    {
        return $query->where('catergorydetails_code', 'like', $shcodes);
    }

    public function scopeFilter($query, $bonus)
    {
        if($bonus == 'B001')
        {
            return $query->where('price', '<=', 100000);
        }
        if($bonus == 'I015')
        {
            return $query->where('price', '>', 100000)->where('price', '<=', 500000);
        }
        if($bonus == 'I510')
        {
            return $query->where('price', '>', 500000)->where('price', '<=', 1000000);
        }
        if($bonus == 'G010')
        {
            return $query->where('price', '>', 100000);
        }

    }

    public function scopeEmptyevent($query)
    {
        return $query->where('event_code','like', '');
    }

    public function scopeEventproduct($query, $code){
        return $query->where('event_code', $code);
    }

    public function scopeName($query, array $name)
    {
        return $query->whereIn('name', $name);
    }

}

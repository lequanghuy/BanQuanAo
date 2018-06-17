<?php

namespace App;


class Billdetail extends Model
{
    public static function hotproduct(array $day)
    {
        return static::selectRaw('name, count(product_qty) as soluong')
            ->whereIn('created_at', $day)
            ->havingRaw('count(product_qty) >= 1')
            ->groupBy('name')
            ->get();
    }
}

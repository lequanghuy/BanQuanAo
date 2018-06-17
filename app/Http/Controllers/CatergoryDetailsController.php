<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\CatergoryDetails;

class CatergoryDetailsController extends Controller
{
    public function product()
    {

        if(request('clothescode'))
        {
            $product = Product::latest()->clcode(request('clothescode'))->get();
        }
        elseif(request('shoescode'))
        {
            $product = Product::latest()->shcode(request('shoescode'))->get();
        }

        $details = request('a');

        return view('productpage', compact('product','details'));


    }
}

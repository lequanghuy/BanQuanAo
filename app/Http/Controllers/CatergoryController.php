<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Catergory;
use App\CatergoryDetails;

class CatergoryController extends Controller
{
//    public function catergoryadmin()
//    {
//        $page = 2;
//        $catergory = Catergory::all();
//        $product = Product::paginate($page);
//        $count = Product::count();
//        return view('admin.maintable', compact('catergory', 'product', 'count', 'page'));
//
//    }

//    public function getDetailList($id,$theloai)
//    {
//            if($theloai == 'Quần áo')
//            {
//                $dt = CatergoryDetails::clothes()->Catid($id)->get();
//            }
//            elseif($theloai == 'Giầy')
//            {
//                $dt = CatergoryDetails::shoes()->Catid($id)->get();
//            }
//            return response()->json($dt);
//    }

}

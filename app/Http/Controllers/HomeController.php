<?php

namespace App\Http\Controllers;

use App\Event;
use App\Billdetail;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        $FirstDay = date("Y-m-d H-i-s", strtotime('monday this week'));
        $LastDay = date("Y-m-d H-i-s", strtotime('monday next week'));
        $billdetails = Billdetail::all()->toArray();
        $arr = [];
        for($i = 0; $i < count($billdetails); $i++)
        {
            if($billdetails[$i]['created_at'] > $FirstDay && $billdetails[$i]['created_at'] < $LastDay)
            {
                array_push($arr, $billdetails[$i]['created_at']);
            }
            else
                continue;
        }
        $hot = Billdetail::hotproduct($arr)->toArray();
        $name = [];
        for($i = 0; $i <count($hot); $i++)
        {
            array_push($name, $billdetails[$i]['name']);
        }
        $producthot = Product::name($name)->get();
        return view('trangchu', compact('event', 'producthot'));
    }

    public function searchpro()
    {
        $q = request('search');
        $product = Product::where('name', 'like', '%' . $q . '%')->get();
        return view('productsearch', compact('product'));
    }
}

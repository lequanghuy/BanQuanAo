<?php

namespace App\Http\Controllers;

use App\Billdetail;
use App\Http\Requests\AddproductForm;
use App\Http\Requests\EditForm;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\Catergory;
use App\CatergoryDetails;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth:admin')->except(['show','buy','removecartitem','updatecart','cart']);
//    }

    public function show(Product $product)
    {
        return view('productdetails', compact('product'));
    }

    public function buy(Product $product)
    {
        if(Auth::check())
        {
            if($product->saleup != null) {
                Cart::instance(auth()->user()->id)->add([
                    'id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => ($product->price)*(1 - $product->saleup), 'options' => ['img' => $product->mainsquare, 'saleup' => $product->saleup]
                ]);
            }
            else{
                Cart::instance(auth()->user()->id)->add([
                    'id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['img' => $product->mainsquare, 'saleup' => $product->saleup]
                ]);
            }
        }
    }

    public function removecartitem()
    {
        if(Auth::check())
        {
            if(request()->ajax())
            {
                $id = request('rowid');
                Cart::instance(auth()->user()->id)->remove($id);
            }
        }
    }

    public function updatecart()
    {
        if(Auth::check())
        {
            if(request()->ajax())
            {
                $id = request('id');
                $qty = request('qty');
                Cart::instance(auth()->user()->id)->update($id, $qty);
            }
        }
    }

    public function cart()
    {
        if(Auth::check())
        {
            $content = Cart::instance(auth()->user()->id)->content();
            $count = Cart::instance(auth()->user()->id)->count();
            $total =  Cart::instance(auth()->user()->id)->total();
            return view('cart', compact('content', 'total', 'count' ));
        }
    }

    public function create(AddproductForm $form)
    {
        $form->make();
    }

    public function edit($rid)
    {
        $edit = Product::find($rid);
        $code = $edit->catergorydetails_code;
        if(substr_compare('QA', $code, 0, 2 ) == 0){
            $theloai = 'Quần áo';
        }
        if(substr_compare('GD', $code, 0, 2 ) == 0){
            $theloai = 'Giầy';
        }
        $detail = CatergoryDetails::code($code)->get()->toArray();
        $catergory = Catergory::all();
        $c = Catergory::id($detail[0]['catergory_id'])->get()->toArray();
        return view('/product.edit', compact('edit', 'detail', 'catergory', 'c', 'theloai'));
    }

    public function submitedit(EditForm $form, $rid)
    {
        $form->submitedit($rid);
        session()->flash('message', 'Cập nhật nhật thành công!');
        return redirect()->back();
    }

    public function delete($rid)
    {
        $delete = Product::find($rid);
        $delete->delete();
        session()->flash('message', 'Xóa thành công!');
        return redirect()->back();

    }

    public function destroy()
    {
        $ids = request('data');
        Product::find($ids)->each(function ($product) {
            $product->delete();
        });
        session()->flash('message', 'Xóa thành công!');
    }

    public function search()
    {
        $q = request('search');
        $product = Product::where('name', 'like', '%' . $q . '%')->paginate(2);
        $product->appends(['search' => $q]);
        $count = $product->count();
        $catergory = Catergory::all();
        return view('/admin.searchtable', compact('product', 'count', 'catergory'));
    }

    public function getDetailList($id,$theloai)
    {
        if($theloai == 'Quần áo')
        {
            $dt = CatergoryDetails::clothes()->Catid($id)->get();
        }
        elseif($theloai == 'Giầy')
        {
            $dt = CatergoryDetails::shoes()->Catid($id)->get();
        }
        return response()->json($dt);
    }

    public function hot()
    {
        //$date = date('Y-m-d');
        $FirstDay = date("Y-m-d H-i-s", strtotime('monday this week'));
        $LastDay = date("Y-m-d H-i-s", strtotime('monday next week'));
        $billdetails = Billdetail::all()->toArray();
        $arr = [];
        for($i = 0; $i < count($billdetails); $i++)
        {
            //dd(date("Y-m-d", strtotime($billdetails[$i]['created_at'])));
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
        return view('trangchu', compact('producthot'));

    }









}

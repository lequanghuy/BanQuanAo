<?php

namespace App\Http\Controllers;

use App\Billdetail;
use App\Events\InsertBill;
use App\Mail\SendEmail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use Illuminate\Support\Facades\Mail;


class BillController extends Controller
{
    public function create()
    {
        if(Auth::check())
        {
            $total = Cart::instance(auth()->user()->id)->total();
            $userid = auth()->user()->id;
            Bill::create([
                'user_id' => $userid,
                'total' => $total,
                'address' =>request('address'),
                'road' =>request('road'),
                'district' =>request('district'),
                'city' =>request('city'),
                'telephone' =>request('telephone'),
                'email' =>request('email'),
                'delivery' => request('delivery'),
                'status' => 'pending',
                'token' => bcrypt(request('email'))
            ]);
            $bill = new Bill;
            event(new InsertBill($bill));
            session()->flash('message', 'Đặt hàng thành công!');
            return redirect()->back();
        }

    }

    public function updatestatus($token)
    {
        Bill::where('token', $token )->update(['status' => 'shipped']);
    }

    public function test()
    {
        return view('checkout.email');
    }

//    public function show()
//    {
//        $page = 2;
//        $bill = Bill::paginate($page);
//        $count = Bill::count();
//        return view('admin.bill.managebill', compact('bill', 'count', 'page'));
//    }

    public function detail($id)
    {
        $billdetail = Bill::find($id)->billdetail;
        return view('admin.bill.billdetail', compact('billdetail'));
    }
}

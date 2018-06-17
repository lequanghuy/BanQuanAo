<?php

namespace App\Http\Controllers;

use App\CatergoryDetails;
use App\Events\CreateEvent;
use App\Http\Requests\CreateEventForm;
use App\Pricefilter;
use App\Event;
use App\Product;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        $filter = Pricefilter::all();
        return view('admin.event.createevent', compact('filter'));
    }

    public function getProductType($key)
    {
        $a = CatergoryDetails::allcodes()->toArray();
        $arrCat = [];
        $arrTar = [];
        for($i = 0; $i < 12; $i++)
        {
            array_push($arrCat, $a[$i]['code']);
        }
        $b = Event::alltargets()->toArray();
        $count = Event::count();
        for($j = 0; $j < $count; $j ++)
        {
            array_push($arrTar, $b[$j]['target']);
        }
        $result = array_diff($arrCat, $arrTar);

        if($key == 0){
            $val = CatergoryDetails::whereIn('code', $result)->man()->get();
        }
        if($key == 1){
            $val = CatergoryDetails::whereIn('code', $result)->woman()->get();
        }
        if($key == 2){
            $val = Pricefilter::all();
        }
        return response()->json($val);
    }

    public function create(CreateEventForm $form)
    {
        if(request()->hasFile('banner')) {
            $file = request()->file('banner');
            $banner = request()->file('banner')->getClientOriginalName();
            if(!file_exists(public_path().'/img/blog/'.$banner)) {
                $file->move(public_path() . '/img/event', $banner);
            }
            $form->make($banner);
        }
        return redirect('admin/event');
    }

    public function delete($rid)
    {
        $delete = Event::find($rid);
        //dd($delete->toArray());
        $arr = $delete->toArray();
        $event_code = $arr['code'];
        Product::where('event_code', $event_code)->update(['event_code' => '', 'saleup' => null]);
        $delete->delete();
        session()->flash('message', 'Xóa thành công!');
        return redirect()->back();
    }

//    public function test(){
//        $event = new Event();
//        event(new CreateEvent($event));
//    }

    public function customerevent($code){
        $event = Event::eventcode($code)->get();
        $product = Product::eventproduct($code)->get();
        return view('eventproduct', compact('event', 'product'));
    }
}

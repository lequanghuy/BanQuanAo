<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Product;

use Carbon\Carbon;
class EditForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function submitedit($rid){
        $edit = Product::find($rid);

        $edit->catergorydetails_code = $this->get('catergorydetails_code1');
        $edit->name = $this->input('name1');
        $edit->price = $this->input('price1');
        $edit->imagefront = $this->input('imagefront1');
        $edit->imageback = $this->input('imageback1');
        $edit->mainimage = $this->input('mainimage1');
        $edit->mainimage = $this->input('mainimage1');
        $edit->mainsquare = $this->input('mainsquare1');
        $edit->detailimagetwo = $this->input('detailimagetwo1');
        $edit->detailsquaretwo = $this->input('detailsquaretwo1');
        $edit->detailimagethree = $this->input('detailimagethree1');
        $edit->detailsquarethree = $this->input('detailsquarethree1');
        $edit->event_code = $this->get('event_code1');
        $edit->detail = $this->input('detail1');
        $edit->material = $this->input('material1');
        $edit->care = $this->input('care1');
        $edit->size = $this->input('size1');
        $edit->fit = $this->input('fit1');
        $edit->advice = $this->get('advice1');
        $edit->brands = $this->input('brands1');
        $edit->updated_at = Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'));

        $edit->save();

    }
}

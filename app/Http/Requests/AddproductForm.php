<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Product;

class AddproductForm extends FormRequest
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

    public function make()
    {
        Product::create($this->only([
            'catergorydetails_code',
            'name',
            'price',
            'imagefront',
            'imageback',
            'mainimage',
            'mainsquare',
            'detailimagetwo',
            'detailsquaretwo',
            'detailimagethree',
            'detailsquarethree',
            'detail',
            'material',
            'care',
            'size',
            'fit',
            'advice',
            'brands',
            ]));

        return redirect('/admin/product');
    }
}

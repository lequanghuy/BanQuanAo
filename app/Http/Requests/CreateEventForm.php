<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Event;

class CreateEventForm extends FormRequest
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

        ];
    }

    public function make($banner)
    {
        Event::create([
            'code' => $this->input('code'),
            'description' => $this->input('description'),
            'saleup' => $this->input('saleup'),
            'target' => $this->get('target'),
            'bonus' => $this->get('bonus'),
            'banner' => $banner,
            'date_start' => $this->input('date_start'),
            'date_end' => $this->input('date_end')
        ]);
    }
}

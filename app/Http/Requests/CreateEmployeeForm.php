<?php

namespace App\Http\Requests;

use App\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CreateEmployeeForm extends FormRequest
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

    public function add()
    {
            Admin::create([
                'name' => $this->input('name'),
                'nickname' => $this->input('nickname'),
                'email' => $this->input('email'),
                'telephone' => $this->input('telephone'),
                'role_id' => $this->get('role_id'),
                'password' => Hash::make($this->input('password'))
            ]);
    }
}

<?php

namespace App\Http\Requests;

use App\Blog;
use Illuminate\Foundation\Http\FormRequest;

class CreateBlog extends FormRequest
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

    public function make($image)
    {
        Blog::create([
            'title' => $this->input('title'),
            'slug' => $this->input('slug'),
            'image' => $image,
            'body' => $this->get('body')
        ]);
    }
}

<?php

namespace App\Http\Requests;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EditBlog extends FormRequest
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

    public function edit($id, $image)
    {
        $edit = Blog::find($id);
        $edit->title = $this->input('title');
        $edit->slug = $this->input('slug');
        $edit->image = $image;
        $edit->body = $this->get('body');
        $edit->updated_at = Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'));

        $edit->save();
    }
}

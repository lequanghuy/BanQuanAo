<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\CreateBlog;
use App\Http\Requests\EditForm;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(CreateBlog $form)
    {
        $file = request()->file('image');
        $image = request()->file('image')->getClientOriginalName();
        if(!file_exists(public_path().'/img/blog/'.$image)) {
            $file->move(public_path() . '/img/blog', $image);
        }
        $form->make($image);
        return redirect()->back();
    }

    public function bloglist()
    {
        $posts = Blog::all();
        return view('blog.blog', compact('posts'));
    }

    public function post($id)
    {
        $post = Blog::find($id);
        return view('blog.post', compact('post'));
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
        session()->flash('message', 'Xóa thành công');
        return redirect()->back();
    }

    public function postform($id)
    {
        $post = Blog::find($id);
        return view('admin.blog.editpost', compact('post'));
    }

    public function edit(EditForm $form)
    {
        $id = request('id');
        $file = request()->file('image1');
        $image = request()->file('image')->getClientOriginalName();
        if(!file_exists(public_path().'/img/blog/'.$image)) {
            $file->move(public_path() . '/img/blog', $image);
        }
        $form->edit($id, $image);
        session()->flash('message', 'Xóa thành công');
        return redirect()->back();
    }
}

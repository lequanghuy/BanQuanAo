<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegistrationForm;

use App\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(RegistrationForm $form)
    {
        $form->persist();
        return redirect('trang-chu');
    }
}

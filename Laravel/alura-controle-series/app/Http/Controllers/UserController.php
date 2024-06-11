<?php

namespace App\Http\Controllers;

class UserController
{
    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        return "user.store";
    }
}

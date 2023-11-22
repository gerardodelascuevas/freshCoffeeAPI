<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout (Request $request)
    {

    }

    public function login(Request $request)
    {

    }

    public function register(RegistroRequest $request)
    {
        $data = $request->validate();
    }
}

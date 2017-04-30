<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pengguna = User::paginate(10);
        return view('pengguna', compact('pengguna'));
    }
}

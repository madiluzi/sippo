<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pengguna = User::where('admin', '<>', 1)->get();
        return view('pengguna.pengguna', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.form-pengguna');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama-lengkap' => 'required|min:3',
        ]);

        $pengguna = new User();
        $pengguna->name = $request->input('nama-lengkap');
        $pengguna->username = $request->input('nama-pengguna');
        $pengguna->email = $request->input('email');
        $pengguna->password = bcrypt($request->input('password'));
        $pengguna->save();
        return redirect('data-pengguna');
    }

    public function update($id)
    {
        $pengguna = User::find($id);
        return view('pengguna.form-edit-pengguna', compact('pengguna'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nama-lengkap' => 'required|min:3',
        ]);

        $pengguna = User::find($id);
        $pengguna->name = $request->input('nama-lengkap');
        $pengguna->username = $request->input('nama-pengguna');
        $pengguna->email = $request->input('email');
        $pengguna->password = bcrypt($request->input('password'));
        $pengguna->update();
        return redirect('data-pengguna');
    }

    public function delete($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect('data-pengguna');
    }
}

<?php

namespace App\Http\Controllers;

use App\Jenis;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function view()
    {
        $jenis = Jenis::all();
        return view('jenis-barang.jenis-barang', compact('jenis'));
    }

    public function tambah()
    {
        return view('jenis-barang.form-jenis-barang');
    }

    public function proses_tambah(Request $request)
    {
        $tambah = new Jenis();
        $tambah->nama_jenis = $request->input('nama-jenis');
        $tambah->save();
        return redirect('data-jenis-barang');
    }

    public function edit($id)
    {
        $detail = Jenis::find($id);
        return view('jenis-barang.form-edit-jenis-barang', [
            'detail' => $detail
        ]);
    }

    public function proses_edit(Request $request, $id)
    {
        $edit = Jenis::find($id);
        $edit->nama_jenis = $request->input('nama-jenis');
        $edit->update();
        return redirect('data-jenis-barang');
    }

    public function hapus($id)
    {
        $hapus = Jenis::find($id);
        $hapus->delete();
        return redirect('data-jenis-barang');
    }
}

<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Jenis;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function view()
    {
        $barang = Barang::all();
        return view('barang.barang', [
            'barang' => $barang
        ]);
    }

    public function tambah()
    {
        $jenis = Jenis::all();
        return view('barang.form-barang', compact('jenis'));
        /*return view('form-barang',[
            'jenis' => $jenis
        ]);*/
    }

    public function proses_tambah(Request $request)
    {
        $tambah = new Barang();
        $tambah->nama_barang = $request->input('nama-barang');
        $tambah->id_jenis = $request->input('id_jenis');
        $tambah->harga_satuan = $request->input('harga-satuan');
        $tambah->save();
        return redirect('data-barang');
    }

    public function edit($id)
    {
        $detail = Barang::find($id);
        $jenis = Jenis::all();
        return view('barang.form-edit-barang',compact('jenis'), [
            'detail' => $detail
        ]);
    }

    public function proses_edit(Request $request, $id)
    {
        $edit = Barang::find($id);
        $edit->nama_barang = $request->input('nama-barang');
        $edit->id_jenis = $request->input('id_jenis');
        $edit->harga_satuan = $request->input('harga-satuan');
        $edit->update();
        return redirect('data-barang');
    }

    public function hapus($id)
    {
        $hapus = Barang::find($id);
        $hapus->delete();
        return redirect('data-barang');
    }
}

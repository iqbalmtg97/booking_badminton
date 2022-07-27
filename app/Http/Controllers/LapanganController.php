<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LapanganController extends Controller
{
    public function index()
    {
        $data = Lapangan::all();
        return view('admin.kelola-lapangan', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama_lapangan' => 'required',
            'biaya_lapangan' => 'required',
        ];

        $text = [
            'nama_lapangan.required' => 'Kolom Nama Lapangan Tidak Boleh Kosong',
            'biaya_lapangan.required' => 'Kolom Biaya Lapangan Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);


        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput()->with('gagal', 'Data Lapangan Gagal Disimpan, Ada Kesalahan Inputan !!!');
        }

        $store = Lapangan::create($request->all());
        return redirect()->back()->with('sukses', 'Data Lapangan Berhasil Disimpan !!!');
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_lapangan' => 'required',
            'biaya_lapangan' => 'required',
        ];

        $text = [
            'nama_lapangan.required' => 'Kolom Nama Lapangan Tidak Boleh Kosong',
            'biaya_lapangan.required' => 'Kolom Biaya Lapangan Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);


        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput()->with('gagal', 'Data Lapangan Gagal Disimpan, Ada Kesalahan Inputan !!!');
        }

        $update = Lapangan::find($request->id)->update($request->all());
        return redirect()->back()->with('sukses', 'Data Lapangan Berhasil Diupdate !!!');
    }

    public function destroy($id)
    {
        $data = Lapangan::find($id)->delete();
        return redirect()->back()->with('sukses', 'Data Lapangan Berhasil Dihapus !!!');
    }

    public function getdata($id)
    {
        $data = Lapangan::find($id);
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::all();
        return view('admin.kelola-booking', compact('data'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'lapangan' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'durasi' => 'required',
            'biaya' => 'required',
            'bukti_bayar' => 'required',
            'status' => 'required',
        ];

        $text = [
            'nama.required' => 'Kolom Judul Film Tidak Boleh Kosong',
            'lapangan.required' => 'Kolom Genre Tidak Boleh Kosong',
            'tanggal.required' => 'Kolom Status Tidak Boleh Kosong',
            'jam.required' => 'Kolom Gambar Tidak Boleh Kosong',
            'durasi.required' => 'Kolom Gambar Tidak Boleh Kosong',
            'biaya.required' => 'Kolom Gambar Tidak Boleh Kosong',
            'bukti_bayar.required' => 'Kolom Gambar Tidak Boleh Kosong',
            'status.required' => 'Kolom Gambar Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);


        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput()->with('gagal', 'Film Gagal Disimpan, Ada Kesalahan Inputan !!!');
        }

        $store = Booking::create($request->all());

        $request->file('bukti_bayar')->move('images/', $request->file('bukti_bayar')->getClientOriginalName());
        $store->bukti_bayar = $request->file('bukti_bayar')->getClientOriginalName();
        $store->save();

        return redirect()->back()->with('sukses', 'Film Berhasil Disimpan !!!');
    }
}

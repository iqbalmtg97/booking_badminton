<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $data = Booking::all();
        $lapangan = Lapangan::all();
        return view('admin.kelola-booking', compact('data','lapangan'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tanggal' => 'required',
            'jam' => 'required',
            'durasi' => 'required',
            // 'biaya' => 'required',
            'status' => 'required',
        ];

        $text = [
            'lapangan.required' => 'Kolom Lapangan Tidak Boleh Kosong',
            'tanggal.required' => 'Kolom Tangal Tidak Boleh Kosong',
            'jam.required' => 'Kolom Jam Tidak Boleh Kosong',
            'durasi.required' => 'Kolom Durasi Tidak Boleh Kosong',
            // 'biaya.required' => 'Kolom Biaya Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);


        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput()->with('gagal', 'Lapangan Gagal Dibooking, Ada Kesalahan Inputan !!!');
        }

        // biaya
        // foreach ($lapangan as $lap) {
        //    $hitung = $lap->biaya_lapangan * 40000;
        // }
        // return hitung;
        $store = Booking::create($request->all());

        if ($request->file('bukti_bayar')) {
            $request->file('bukti_bayar')->move('images/', $request->file('bukti_bayar')->getClientOriginalName());
            $data->bukti_bayar = $request->file('bukti_bayar')->getClientOriginalName();
            $data->save();
        } else {
           
        }
        
        return redirect()->back()->with('sukses', 'Lapangan Berhasil Dibooking !!!');
    }

    public function updateBuktibayar(Request $request)
    {
        // dd($request->all());
        $rules = [
            'bukti_bayar' => 'required',
        ];

        $text = [
            'bukti_bayar.required' => 'Kolom Bukti Bayar Tidak Boleh Kosong',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput()->with('gagal', 'Bukti Bayar Gagal Diupload, Ada Kesalahan Inputan !!!');
        }

        $data = Booking::find($request->id);
        if ($request->file('bukti_bayar')) {
            $data->update($request->only(['bukti_bayar']));
            $request->file('bukti_bayar')->move('images/', $request->file('bukti_bayar')->getClientOriginalName());
            $data->bukti_bayar = $request->file('bukti_bayar')->getClientOriginalName();
            $data->save();
        }

        return redirect()->back()->with('sukses', 'Bukti Bayar Berhasil Diupload !!!');
    }

    public function batal(Request $request, $id)
    {
        $data = Booking::find($id);
        $file = public_path('/images/') . $data->bukti_bayar;
        @unlink($file);
        $data->save();
        return redirect()->back()->with('sukses', 'Booking Berhasil Dibatalkan !!!');
    }

    public function getdata($id)
    {
        $data = Booking::find($id);
        return $data;
    }
}

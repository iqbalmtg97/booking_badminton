<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;

class PenyewaController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        $penyewas = User::all();
        return view('admin.kelola-penyewa', compact('penyewas', 'booking'));
    }

    public function destroy($id)
    {
        $data = User::find($id)->delete();
        return redirect()->back()->with('sukses', 'Data Penyewa Berhasil Dihapus !!!');
    }
}

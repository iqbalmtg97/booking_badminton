<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = User::all();
        return view('admin.kelola-penyewa',compact('penyewas'));
        return view('admin.kelola-penyewa');
    }

    public function destroy($id)
    {
        $data = User::find($id)->delete();
        return redirect()->back()->with('sukses', 'Data Penyewa Berhasil Dihapus !!!');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = \App\Models\User::all();
        return view('admin.kelola-penyewa',compact('penyewas'));
        return view('admin.kelola-penyewa');
    }

    
}

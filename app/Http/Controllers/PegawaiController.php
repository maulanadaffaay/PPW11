<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function indeks(){
        $data = Pegawai::all();
        return view('main', compact('data'));
    }
}

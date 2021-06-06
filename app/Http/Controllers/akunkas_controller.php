<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\akun_kas_model;
use App\Models\kas_model;


class akunkas_controller extends Controller
{
    public function index()
    {
        $akun_kas = DB::table('akun_kas')->get();

        return view('admin.kas.akun', ['kas' => $akun_kas]);
    }

    public function store(Request $request)
    {
        $add = new akun_kas_model;
        $add->kode = $request->kode;
        $add->nama = $request->nama;
        $add->type = $request->type;
        $add->save();
        return redirect('/akunkas');
    }

    public function rekapitulasi()
    {
        $data = DB::table('kas')
            ->join('akun_kas', 'akun_kas.id', '=', 'kas.id_akun')
            ->select('akun_kas.nama as namaKas', 'akun_kas.kode', 'akun_kas.type', 'kas.jumlah', 'kas.keterangan')
            ->get();

        $akun_kas = DB::table('akun_kas')->get();

        return view('admin.kas.rekapitulasi', ['data' => $data, 'akun_kas' => $akun_kas]);
    }

    public function saveKas(Request $request)
    {
        $add = new kas_model;
        $add->id_akun       = $request->id_akun;
        $add->jumlah        = $request->jumlah;
        $add->keterangan    = $request->keterangan;
        $add->save();
        return redirect('/akunkas');
    }
}

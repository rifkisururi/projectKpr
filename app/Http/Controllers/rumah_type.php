<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rumah_type extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \App\Models\rumah_type_model;
        $data->label = $request->get('label');
        $data->typerumah = $request->get('typerumah');
        $data->luas = $request->get('luas');
        $data->keterangan = $request->get('keterangan');
        $data->spesifikasi = $request->get('spesifikasi');
        $data->gambar1 = $request->get('gambar1');
        $data->gambar2 = $request->get('gambar2');
        $data->gambar3 = $request->get('gambar3');
        $data->cicilan5 = $request->get('cicilan5');
        $data->cicilan10 = $request->get('cicilan10');
        $data->cicilan15 = $request->get('cicilan15');
        $data->cicilan20 = $request->get('cicilan20');
        $data->harga_dp = $request->get('harga_dp');
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumah_type =
            DB::table('rumah_type')
            ->where('id', '=', $id)
            ->select('label', 'id', 'typerumah', 'keterangan', 'spesifikasi', 'gambar1', 'gambar2', 'gambar3', 'luas', 'cicilan5', 'cicilan10', 'cicilan15', 'cicilan20', 'harga_dp')
            ->first();

        return view('admin.typerumah.edit', ['rumah' => $rumah_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Models\rumah_type_model::findOrFail($id);
        //$update_barang->kd_brg = $request->get('addkdbrg');
        $data->label = $request->get('label');
        $data->typerumah = $request->get('typerumah');
        $data->luas = $request->get('luas');
        $data->keterangan = $request->get('keterangan');
        $data->spesifikasi = $request->get('spesifikasi');
        $data->gambar1 = $request->get('gambar1');
        $data->gambar2 = $request->get('gambar2');
        $data->gambar3 = $request->get('gambar3');
        $data->cicilan5 = $request->get('cicilan5');
        $data->cicilan10 = $request->get('cicilan10');
        $data->cicilan15 = $request->get('cicilan15');
        $data->cicilan20 = $request->get('cicilan20');
        $data->harga_dp = $request->get('harga_dp');
        $data->save();
        return redirect('/typerumah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rumah_type')
            ->where('id', '=', $id)
            ->delete();

        return redirect('/typerumah');
    }
}

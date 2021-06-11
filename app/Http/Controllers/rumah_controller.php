<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\rumah_detail_model;

class rumah_controller extends Controller
{

    public function index()
    {
        $rumah = DB::table('vw_statusRumah')
            ->get();

        $rumahType = DB::table('rumah_type')->get();
        return view('admin.rumah.index', ['rumah' => $rumah, 'rumahType' => $rumahType]);
    }

    public function typerumah()
    {
        $rumahType = DB::table('rumah_type')->get();
        return view('admin.typerumah.index', ['rumahType' => $rumahType]);
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
        $add = new rumah_detail_model;
        $add->id_rumah_type = $request->id_rumah_type;
        $add->alamat = $request->alamat;
        $add->save();
        return redirect('/rumahAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumah =
            DB::table('rumah_detail')
            ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
            ->where('rumah_detail.id', '=', $id)
            ->select('rumah_detail.alamat', 'rumah_detail.id', 'rumah_type.label', 'rumah_detail.id_rumah_type')
            ->first();

        $rumahType = DB::table('rumah_type')->get();

        return view('admin.rumah.edit', ['rumah' => $rumah, 'rumahType' => $rumahType]);
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
        $data = rumah_detail_model::findOrFail($id);
        //$update_barang->kd_brg = $request->get('addkdbrg');
        $data->id_rumah_type = $request->get('type');
        $data->alamat = $request->get('alamat');
        $data->save();
        return redirect('/rumahAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rumah_detail')
            ->where('rumah_detail.id', '=', $id)
            ->delete();

        return redirect('/rumahAdmin');
    }

    public function userrumahtype()
    {
        $rumahType = DB::table('rumah_type')->get();
        return view('rumah.type', ['rumahType' => $rumahType]);
    }


    public function listrumah($id)
    {
        $rumah = DB::table('vw_statusRumah')
            ->where('id_rumah_type', '=', $id)
            ->get();

        return view('rumah.listrumah', ['rumah' => $rumah]);
    }
}

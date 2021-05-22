<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\bookingModel;

class booking_controller extends Controller
{
    public function booking($id)
    {
        $rumah = DB::table('rumah_detail')
            ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
            ->where('rumah_detail.id', '=', $id)
            ->select('rumah_detail.alamat', 'rumah_detail.id', 'rumah_type.label', 'rumah_type.cicilan5', 'rumah_type.cicilan10', 'rumah_type.cicilan15', 'rumah_type.cicilan20')
            ->first();

        return view('booking.index', ['rumah' => $rumah]);
    }

    public function savebooking(Request $request, $id)
    {
        $idUser = Auth::user()->id;
        $jumlah_cicilan = $request->get('cicilan');

        if ($jumlah_cicilan == 5) {

            $nominal_cicilan = DB::table('rumah_detail')
                ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
                ->where('rumah_detail.id', '=', $id)
                ->value('rumah_type.cicilan5');
        } elseif ($jumlah_cicilan == 10) {

            $nominal_cicilan = DB::table('rumah_detail')
                ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
                ->where('rumah_detail.id', '=', $id)
                ->value('rumah_type.cicilan10');
        } elseif ($jumlah_cicilan == 15) {

            $nominal_cicilan = DB::table('rumah_detail')
                ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
                ->where('rumah_detail.id', '=', $id)
                ->value('rumah_type.cicilan15');
        } elseif ($jumlah_cicilan == 20) {

            $nominal_cicilan = DB::table('rumah_detail')
                ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
                ->where('rumah_detail.id', '=', $id)
                ->value('rumah_type.cicilan20');
        }

        $data = new bookingModel;
        $data->id_rumah_detail = $id;
        $data->id_user = $idUser;
        $data->jumlah_cicilan = $jumlah_cicilan;
        $data->harga_cicilan = $nominal_cicilan;
        $data->status = 0;
        $data->harga_dp = 0;
        $data->id_admin = 0;
        $data->bukti = "";
        $data->save();
        return redirect('/riwayat');
    }

    function history()
    {
        $idUser = Auth::user()->id;
        $booking = DB::table('vw_bookingStatus')
            ->where('vw_bookingStatus.id_user', '=', $idUser)
            ->get();

        return view('booking.riwayat', ['booking' => $booking]);
    }
}

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
            ->select('rumah_detail.alamat', 'rumah_detail.id', 'rumah_type.label', 'rumah_type.cicilan5', 'rumah_type.cicilan10', 'rumah_type.cicilan15', 'rumah_type.cicilan20', 'rumah_type.harga_dp')
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

        $harga_dp = DB::table('rumah_detail')
            ->join('rumah_type', 'rumah_detail.id_rumah_type', '=', 'rumah_type.id')
            ->where('rumah_detail.id', '=', $id)
            ->value('rumah_type.harga_dp');

        $data = new bookingModel;
        $data->id_rumah_detail = $id;
        $data->id_user = $idUser;
        $data->jumlah_cicilan = $jumlah_cicilan;
        $data->harga_cicilan = $nominal_cicilan;
        $data->status = 0;
        $data->harga_dp = $harga_dp;
        $data->id_admin = 0;
        $data->bukti = "";
        $data->save();
        return redirect('/riwayat');
    }

    function history()
    {
        if (Auth::user()->hasRole('admin')) {
            $booking = DB::table('vw_bookingStatus')
                ->where('vw_bookingStatus.status_booking', '=', 3)
                ->get();
        } elseif (Auth::user()->hasRole('marketing')) {
            $booking = DB::table('vw_bookingStatus')
                ->where('vw_bookingStatus.status_booking', '=', 0)
                ->get();
        } else {
            $idUser = Auth::user()->id;
            $booking = DB::table('vw_bookingStatus')
                ->where('vw_bookingStatus.id_user', '=', $idUser)
                ->get();
        }

        $title = "Riwayat Booking";


        return view('booking.riwayat', ['booking' => $booking, 'title' => $title]);
    }

    function proses($id, $status)
    {
        $data = bookingModel::findOrFail($id);
        $data->status = $status;
        $data->save();
        return redirect('/riwayat');
    }

    function saveBukti(Request $request)
    {

        $id = $request->get('id');

        $file = $request->file('bukti');

        // nama file
        echo 'File Name: ' . $file->getClientOriginalName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize();
        echo '<br>';

        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'bukti';
        $bukti = $id . "." . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $bukti);

        $data = bookingModel::findOrFail($id);
        $data->bukti = $bukti;
        $data->save();
        return redirect('/riwayat');
    }
}

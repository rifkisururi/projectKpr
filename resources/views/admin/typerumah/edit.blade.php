@extends('layouts.layout')
@section('content')

<form action="" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <table class="table">
        <tr>
            <td>
                Label
            </td>
            <td>
                <input type="text" value="{{$rumah->label}}" name="label" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Type
            </td>
            <td>
                <input type="text" value="{{$rumah->typerumah}}" name="typerumah" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Luas
            </td>
            <td>
                <input type="number" value="{{$rumah->luas}}" name="luas" class="form-control">
            </td>
        </tr>

        <tr>
            <td>
                Keterangan
            </td>
            <td>
                <textarea class="form-control" rows="3" value="" name="keterangan">{{$rumah->keterangan}}</textarea>
            </td>
        </tr>

        <tr>
            <td>
                Spesifikasi
            </td>
            <td>
                <textarea class="form-control" rows="3" value="" name="spesifikasi">{{$rumah->spesifikasi}}</textarea>
            </td>
        </tr>


        <tr>
            <td>
                Gambar 1
            </td>
            <td>
                <input type="text" value="{{$rumah->gambar1}}" name="gambar1" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Gambar 2
            </td>
            <td>
                <input type="text" value="{{$rumah->gambar2}}" name="gambar2" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Gambar 3
            </td>
            <td>
                <input type="text" value="{{$rumah->gambar3}}" name="gambar3" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Cicilan 5
            </td>
            <td>
                <input type="text" value="{{$rumah->cicilan5}}" name="cicilan5" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Cicilan 10
            </td>
            <td>
                <input type="text" value="{{$rumah->cicilan10}}" name="cicilan10" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Cicilan 15
            </td>
            <td>
                <input type="text" value="{{$rumah->cicilan15}}" name="cicilan15" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Cicilan 20
            </td>
            <td>
                <input type="text" value="{{$rumah->cicilan20}}" name="cicilan20" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Harga DP
            </td>
            <td>
                <input type="text" value="{{$rumah->harga_dp}}" name="harga_dp" class="form-control">
            </td>
        </tr>

        <tr>
            <td>
            </td>
            <td>
                <input type="submit" class="btn btn-success btn-send" value="Simpan">
                <a href="../../typeRumah"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
            </td>
        </tr>
    </table>

</form>

@endsection
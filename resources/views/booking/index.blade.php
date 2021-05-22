@extends('layouts.layout')
@section('content')

<h2>Formulir Pemesanan</h2>

<form method="POST">
    @csrf

    <div class="form-group">
        <label for="">Jenis</label>
        <input type="text" class="form-control" value="{{$rumah->label}}" disabled>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" class="form-control" value="{{$rumah->alamat}}" disabled>
    </div>
    <div class="form-group">
        <label for="">Cicilan</label>
        <select class="form-control" name="cicilan">
            <option value="20">20 Tahun ( {{$rumah->cicilan20}}/bln )</option>
            <option value="15">15 Tahun ( {{$rumah->cicilan15}}/bln )</option>
            <option value="10">10 Tahun ( {{$rumah->cicilan10}}/bln )</option>
            <option value="5">5 Tahun ( {{$rumah->cicilan5}}/bln )</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
</form>

@endsection
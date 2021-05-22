@extends('layouts.layout')
@section('content')



@foreach($rumahType as $r)

<div class="card">
    <div class="card-body">
        <img src="{{ $r->gambar1}}" width="400px" height="300px">
        <img src="{{ $r->gambar2}}" width="400px" height="300px">
        <img src="{{ $r->gambar3}}" width="400px" height="300px">
        <br>
        <br>
        <h5 class="card-title">{{$r->label}}</h5>
        <p class="card-text">{{ $r->keterangan}}</p>
        <p class="card-text">{{ $r->spesifikasi}}</p>
        <a href="type/{{ $r->id}}" class="btn btn-primary">Cari Rumah</a>
    </div>
</div>

@endforeach

@endsection
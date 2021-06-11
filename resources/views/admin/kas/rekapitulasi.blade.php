@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekapitulasi Kas</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btnprimary shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </button>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode Kas</th>
                        <th>Nama Kas</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Note</th>
                        <th>Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $r)
                    <tr>
                        <td>{{ $r->kode}}</td>
                        <td>{{ $r->namaKas}}</td>
                        <td>
                            @php
                            if($r->type == 1){
                            echo $r->jumlah;
                            }
                            @endphp
                        </td>
                        <td>
                            @php
                            if($r->type == 0){
                            echo $r->jumlah;
                            }
                            @endphp
                        </td>
                        <td>{{ $r->keterangan}}</td>

                        <td>
                            <a href="kasHapus/{{$r->id}}"> <button class="btn btn-danger btn-sm">Hapus</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" ariahidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modaltitle" id="exampleModalScrollableTitle">Tambah Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">kode</label>
                        <select name="id_akun" class="form-control">
                            @foreach($akun_kas as $ak)
                            <option value="{{ $ak->id }}"> {{ $ak->kode }} - {{ $ak->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="keterangan" name="keterangan" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" datadismiss="modal"> Batal</button>
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
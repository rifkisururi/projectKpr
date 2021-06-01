@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Data Tipe Rumah</h1>
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
                        <th>Tipe</th>
                        <th>Tipe Rumah</th>
                        <th>Luas</th>
                        <th>Keterangan</th>
                        <th>Spesifikasi</th>
                        <th>Gambar 1</th>
                        <th>Gambar 2</th>
                        <th>Gambar 3</th>
                        <th>Cicilan 5 th</th>
                        <th>Cicilan 10 th</th>
                        <th>Cicilan 15 th</th>
                        <th>Cicilan 20 th</th>
                        <th>Harga DP</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rumahType as $r)
                    <tr>
                        <td>{{ $r->label}}</td>
                        <td>{{ $r->typerumah}}</td>
                        <td>{{ $r->luas}}</td>
                        <td>{{ $r->keterangan}}</td>
                        <td>{{ $r->spesifikasi}}</td>
                        <td><a href="{{ $r->gambar1}}" target="_blank">gambar 1</a> </td>
                        <td><a href="{{ $r->gambar2}}" target="_blank">gambar 3</a> </td>
                        <td><a href="{{ $r->gambar3}}" target="_blank">gambar 2</a> </td>
                        <td>{{ $r->cicilan5}}</td>
                        <td>{{ $r->cicilan10}}</td>
                        <td>{{ $r->cicilan15}}</td>
                        <td>{{ $r->cicilan20}}</td>
                        <td>{{ $r->harga_dp}}</td>

                        <td>
                            <a href="typerumah/edit/{{$r->id}}"> <button class="btn btn-sm btn-warning">Edit</button></a>
                            <a href="typerumah/hapus/{{$r->id}}"><button class="btn btn-sm btn-danger">Hapus</button></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" ariahidden="true">
    <div class="modal-dialog" role="document">
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
                        <label for="">Label</label>
                        <input type="text" name="label" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Type Rumah</label>
                        <input type="text" name="typerumah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Luas</label>
                        <input type="number" name="luas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Spesifikasi</label>
                        <input type="text" name="spesifikasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar 1</label>
                        <input type="text" name="gambar1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar 2</label>
                        <input type="text" name="gambar2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar 3</label>
                        <input type="text" name="gambar3" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cicilan 5</label>
                        <input type="text" name="cicilan5" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cicilan 10</label>
                        <input type="text" name="cicilan10" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cicilan 15</label>
                        <input type="text" name="cicilan15" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cicilan 20</label>
                        <input type="text" name="cicilan20" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga DP</label>
                        <input type="number" name="harga_dp" class="form-control">
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
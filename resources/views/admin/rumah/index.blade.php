@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Data Rumah</h1>
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
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rumah as $r)
                    <tr>
                        <td>{{ $r->label}}</td>
                        <td>{{ $r->alamat}}</td>
                        <td>
                            <?php if ($r->status == null) {
                                echo "<button class='btn btn-success btn-sm'>Ready</button>";
                            } elseif ($r->status == 1) {
                                echo "<button class='btn btn-warning btn-sm'>Menunggu Pembayaran</button>";
                            } elseif ($r->status == 2) {
                                echo "<button class='btn btn-danger btn-sm'>Sudah di booking</button>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($r->status == null) { ?>
                                <a href="rumahAdmin/edit/{{$r->id}}"> <button class="btn btn-warning btn-sm">Edit</button></a>
                                <a href="rumahAdmin/hapus/{{$r->id}}"> <button class="btn btn-danger btn-sm">Hapus</button></a>
                            <?php } ?>
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
                        <label for="">Tipe Rumah</label>
                        <select id="roles" name="id_rumah_type" class="form-control" required>
                            @foreach ($rumahType as $rt)
                            <option value="{{$rt->id}}">{{$rt->label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
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
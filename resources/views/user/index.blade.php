@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Data Pengguna</h1>
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
                        <th>No KTP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>NPWP</th>
                        @role('admin')
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                        @endrole
                        @role('marketing')
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{ $u->no_ktp}}</td>
                        <td>{{ $u->name}}</td>
                        <td>{{ $u->alamat}}</td>
                        <td>{{ $u->email}}</td>
                        <td>{{ $u->no_hp}}</td>
                        <td>{{ $u->npwp}}</td>
                        @role('admin')
                        <td>{{ $u->hakAkses}}</td>
                        <td><a href="user/ubahAkses/{{ $u->id}}"><button class="btn btn-warning btn-sm">Ubah Akses</button></a></td>
                        @endrole
                        @role('marketing')
                        <td>{{ $u->hakAkses}}</td>
                        <td>
                            <?php if ($u->hakAkses == 'user') {
                                if ($u->verified == 0) {
                                    echo "<button class='btn btn-warning' onclick='myFunction(" . $u->id . ")'>Data Sudah Valid ?</button>";
                                } else {
                                    echo "<button class='btn btn-success'>Data Valid</button>";
                                }
                            } ?>
                        </td>
                        @endrole
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
            <form action="../akun" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode akun</label>
                        <input type="text" name="kd_akun" id="addkdbrg" class="formcontrol" maxlegth="5" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Akun</label>
                        <input type="text" name="nm_akun" id="addnmbrg" class="formcontrol" id="exampleFormControlInput1">
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

<script>
    function myFunction(id) {
        var txt;
        if (confirm("Apakah anda yakin?")) {
            txt = "1";
        } else {
            txt = "0";
        }
        //document.getElementById("demo").innerHTML = txt;
        window.location.href = "verifikasi/" + id + "/" + txt;

    }
</script>
@endsection
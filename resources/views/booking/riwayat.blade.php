@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Booking</h1>
</div>
<hr>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Label</th>
                        <th>Alamat</th>
                        <th>DP</th>
                        <th>Cicilan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach($booking as $r)
                <tr>
                    <td>{{$r->name}}</td>
                    <td>{{$r->label}}</td>
                    <td>{{$r->alamat}}</td>
                    <td>{{$r->harga_dp}}</td>
                    <td>{{$r->jumlah_cicilan}}/ bulan <br>
                        selama {{$r->jumlah_cicilan}} tahun
                    </td>
                    <td>
                        <?php
                        if ($r->status_booking == 0) {
                            echo '<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable" onclick=getID(' . $r->id . ')>
                            <i class="fas fa-plus fa-sm text-white-50"></i> Upload Bukti Trasfer
                        </button>';
                        } elseif ($r->status_booking === 1) {
                            echo "<button class='btn btn-danger'>Pesanan Gagal</button>";
                        } elseif ($r->status_booking === 2) {
                            echo "<button class='btn btn-success'>Pesanan Sukses</button>";
                        }
                        ?>
                    </td>
                </tr>


                @endforeach

            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" ariahidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modaltitle" id="exampleModalScrollableTitle">Upload Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Bukti Trasfer</label>
                        <input type="file" name="bukti" class="form-control">
                    </div>
                    <div class="form-group" hidden>
                        <label for="">ID</label>
                        <input type="text" name="id" id="id" class="form-control">
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
    function getID(id) {
        console.log(id);
        document.getElementById('id').value = id;
    }
</script>


@endsection
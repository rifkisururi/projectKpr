@extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pilih Rumah</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>Alamat</td>
                    <td>Status</td>
                </tr>
                @foreach($rumah as $r)
                <tr>
                    <td>{{$r->alamat}}</td>
                    <td>
                        <?php
                        if ($r->status === 1) {
                            echo "Sudah ada yang memesan, tapi belum dibayar<br>";
                            echo "<a href='../booking/" . $r->id . "'><button class='btn btn-success '>Pesan Sekarang</button></a>";
                        } elseif ($r->status === 0) {
                            echo "<a href='../booking/" . $r->id . "'><button class='btn btn-success '>Pesan Sekarang</button></a>";
                        } elseif ($r->status === 2) {
                            echo "<button class='btn btn-danger'>Sudah di booking</button>";
                        }
                        ?>
                    </td>
                </tr>


                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection
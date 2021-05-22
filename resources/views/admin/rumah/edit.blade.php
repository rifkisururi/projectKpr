@extends('layouts.layout')
@section('content')

<form action="" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <table class="table">
        <tr>
            <td>
                Type
            </td>
            <td>
                <select class="form-control" name="type">
                    <option value="{{$rumah->id_rumah_type}}">{{$rumah->label}}</option>
                    @foreach ($rumahType as $rt)
                    <?php
                    if ($rt->id == $rumah->id_rumah_type) {
                    } else {
                    ?>
                        <option value="{{$rt->id}}">{{$rt->label}}</option>
                    <?php } ?>
                    @endforeach

                </select>
            </td>
        </tr>
        <tr>
            <td>
                Alamat
            </td>
            <td>
                <textarea class="form-control" rows="3" value="" name="alamat">{{$rumah->alamat}}</textarea>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" class="btn btn-success btn-send" value="Simpan">
                <a href="../../rumahAdmin"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a>
            </td>
        </tr>
    </table>

</form>

@endsection
@extends('admin')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Judul Berita</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Penulis
                    <a href="{{route('judul.create')}}" class="btn btn-outline-primary float-right">Tambah Penulis</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($judul as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->judul}}</td>
                                <td>
                                    <form action="{{route('judul.destroy',$data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('judul.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('judul.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

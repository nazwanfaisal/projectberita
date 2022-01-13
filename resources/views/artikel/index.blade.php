@extends('admin')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Berita</h1>
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
                    <a href="{{route('artikel.create')}}" class="btn btn-outline-primary float-right">Tambah Penulis</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Judul</th>
                                <th>artikel</th>
                                <th>content</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($artikel as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->judul->judul}}</td>
                                <td>{{$data->artikel}}</td>
                                <td>{{$data->content}}</td>
                                <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="cover"></td>

                                <td>
                                    <form action="{{route('artikel.destroy',$data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('artikel.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('artikel.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
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

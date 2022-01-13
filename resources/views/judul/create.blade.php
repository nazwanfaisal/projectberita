@extends('admin')
@section('header')
<div class="content-haeder">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Penulis</h1>

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
                <div class="card-header">Data Penulis
                </div>
                <div class="card-body">
                    <form action="{{route('judul.store')}}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="">Masukan Judul</label>
              <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror">

             @error('judul')
             <span class="invalid-feedback" role="alert">
                 <strong>{{$message}}</strong>
             </span>

             @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning">Reset</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
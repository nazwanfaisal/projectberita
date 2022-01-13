@extends('admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Berita</h1>
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
                <div class="card-header">Data Berita</div>
                <div class="card-body">
                    <form action="{{route('artikel.update',$artikel->judul_id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Judul Berita</label>
                            <input type="text" name="judul_id" value="{{$artikel->judul_id}}" class="form-control @error('judul_id') is-invalid @enderror">
                            @error('judul_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Artikel Berita</label>
                            <input type="text" name="artikel" value="{{$artikel->artikel}}" class="form-control @error('artikel') is-invalid @enderror">
                            @error('artikel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Masukan Content Berita</label>
                            <input type="text" name="content" value="{{$artikel->content}}" class="form-control @error('content') is-invalid @enderror">
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="">Masukan Cover Buku</label>
                                <br>
                                <img src="{{ $artikel->image() }}" height="75" style="padding:10px;" />
                                <input type="file" name="cover" class="form-control">
                            </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
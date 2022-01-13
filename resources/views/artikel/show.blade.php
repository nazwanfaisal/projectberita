@extends('admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Berita</h1>
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
                    <form action="{{route('artikel.update',$artikel->judul)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Judul Berita</label>
                            <input type="text" name="judul_id" value="{{$artikel->judul}}" class="form-control @error('judul_id') is-invalid @enderror" disabled>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Artikel Berita</label>
                            <input type="text" name="artikel" value="{{$artikel->artikel}}" class="form-control @error('artikel') is-invalid @enderror" disabled>
                            @error('artikel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Content Berita</label>
                            <input type="text" name="content" value="{{$artikel->content}}" class="form-control @error('content') is-invalid @enderror" disabled>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         <div class="form-group">
                                <label for=""> Cover Buku</label>
                                <br>
                                <img src="{{ $artikel->image() }}" height="75" style="padding:10px;" />
                                <input type="file" name="cover" class="form-control">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
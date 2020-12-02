@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/company">Company</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 m-2">
            <form action="/company" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  id="nama" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                
                </div>
                <div class="form-group">
                    <label for="email">Email Perusahaan</label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website">Website Perusahaan</label>
                    <input type="text" name="website" class="form-control @error('email') is-invalid @enderror" id="website" value="{{ old('website') }}">
                    @error('website')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control-file @error('logo') is-invalid @enderror" id="logo" type="file" name="logo">
                    @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
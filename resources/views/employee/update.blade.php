@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/employee">Employee</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 m-2">
            <form action="/employee/{{$employee->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  id="name" value="{{$employee->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <label for="inlineFormCustomSelect">Select Category</label> --}}
                    <select name="company" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>{{$employee->id}}</option>
                        @foreach ($company as $option)
                            <option value="{{$option->id}}">{{$option->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
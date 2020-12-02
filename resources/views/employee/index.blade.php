@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
       
          <li class="breadcrumb-item active" aria-current="page"> employee</li>
        </ol>
    </nav>
    @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
</div>

<div class="container">
    <div class="card p-3 m-2">
        <div class="d-flex justify-content-lg-end mb-3">
            <a class="btn btn-outline-dark" href="/employee/create"><span class="icon text">
                <i class="fas fa-plus"></i>
            </span>Tambah Data</a>
    
        </div>
        <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Perusahaan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            
                @foreach($employee as $key => $item)
                <tr>
                <th scope="row">{{ $key + $employee->firstItem()}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->company->nama}}</td>
                    <td>
                        <form action="/employee/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="/employee/{{$item->id}}/edit" class="btn btn-success" ><i class="fas fa-edit"></i></a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$employee->links()}}
        </div>
    </div>
</div>





@endsection

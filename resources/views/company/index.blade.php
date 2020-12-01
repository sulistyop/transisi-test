@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
       
          <li class="breadcrumb-item active" aria-current="page"> Company</li>
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
            <a class="btn btn-outline-dark" href="/company/create"><span class="icon text">
                <i class="fas fa-plus"></i>
            </span>Tambah Data</a>
    
        </div>
        <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Product</th>
                <th scope="col">email</th>
                <th scope="col">logo</th>
                <th scope="col">website</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                
                <?php $i=1; ?>
              
                @foreach($company as $key => $item)
                <tr>
                <th scope="row">{{ $key + $company->firstItem()}}</th>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->logo}}</td>
                    <td><a href="https://{{$item->website}}" class="text-reset">{{$item->website}}</a></td>
                    <td>
                        
                        <form action="/company/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="/company/{{$item->id}}" class="btn btn-primary" ><i class="fas fa-search"></i></a> 
                        <a href="/company/{{$item->id}}/edit" class="btn btn-success" ><i class="fas fa-edit"></i></a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$company->links()}}
        </div>
    </div>
</div>





@endsection

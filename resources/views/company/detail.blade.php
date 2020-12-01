@extends('layouts.app')

@section('content')
<style>
    .cstm{
        background:floralwhite;
    }

    @media screen and (max-width:800px) {
     .cstm{
        display:block;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }

   }
 }
 </style>
<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/company">Company</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Company</li>
            </ol>
        </nav>
        <div class="row no-gutters">
          <div class="col-lg-4">
            <img src="{{$company->logo}}" class="img-fluid img-thumbnail">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h3>Nama Perusahaan : {{$company->nama}}</h3>
                <p class="font-weight-bolder"></p>
                <hr>
                <p class="font-weight-bolder">Contact E-mail : {{$company->email}} </p>
                <p class="font-weight-bolder">Alamat Website : <a href="https://{{$company->website}} ">{{$company->website}} </a></p>
                <p class="card-text"><small class="text-muted">Last updated {{$company->updated_at->diffForHumans()}}</small></p>
                <div class="cstm">
                    <nav aria-label="breadcrumb" class="d-flex bg-light justify-content-end cstm" >
                        <div class="form-inline" aria-expanded="false">
                            {{-- <button class="btn btn-dark my-2 my-sm-0 m-2" type="submit">Back</button> --}}
               
                        </div>
                    </nav>
                </div>
            </div>
          </div>
        </div>
  
    



</div>






@endsection

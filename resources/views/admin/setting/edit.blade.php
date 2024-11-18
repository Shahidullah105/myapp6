@extends('layouts.master')

@section('content')
 <!-- start page title -->
  
 <div class="card">
  <div class="card-header">
    Update Setting
  </div>
  <div class="card-body">
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-error">
        {{ session()->get('error') }}
    </div>
@endif
  <form  action="{{url('/setting/update')}}" method="POST" enctype="multipart/form-data">
     @csrf
  <div class="form-group">
    <label for="exampleInputEmail1"> Company Name</label>
    <input type="text" name="compay_name" value="{{$data->compay_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" value="{{$data->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" name="address" value="{{$data->address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Logo</label>
    <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    <img src="{{ asset('logo/'.$data['logo']) }}" alt="IMG"  height="50px" width="50px" class="mt-2">
  </div>
 
  <button type="submit" class="btn btn-dark mt-2">Update</button>
</form>
  </div>
</div>
@endsection

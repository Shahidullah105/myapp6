@extends('layouts.master')

@section('content')
 <!-- start page title -->
 
 <div class="card">
  <div class="card-header">
    Add Customer Info
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
  <form  action="{{url('/customer/submit')}}" method="POST" enctype="multipart/form-data">
     @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="pic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
   
  </div>
 
  <button type="submit" class="btn btn-dark mt-2">Submit</button>
</form>
  </div>
</div>
@endsection

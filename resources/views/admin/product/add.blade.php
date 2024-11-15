@extends('layouts.master')

@section('content')
 <!-- start page title -->
 
 <div class="card"> 
  <div class="card-header">
    Add Product Information 
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
  <form  action="{{url('/product/submit')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <label for="exampleInputEmail1">Category</label>
   <select class="form-select" name="category" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
<label for="exampleInputEmail1">Brand</label>
   <select class="form-select" name="brand" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Code</label>
    <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter code">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Cost</label>
    <input type="text" name="cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter cost">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Unit</label>
    <input type="text" name="unit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter unit">

  </div>

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">details</label>
  <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
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

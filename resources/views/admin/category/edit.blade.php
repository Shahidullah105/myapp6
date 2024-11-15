@extends('layouts.master')

@section('content')
 <!-- start page title -->
 
 <div class="card">
  <div class="card-header">
    Edit Category  </div>
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
  <form  action="{{url('/category/update')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <input type="hidden" name="id" value="{{$record->id}}">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  value="{{$record->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Remarks</label>
    <input type="text" name="remarks" value="{{$record->remarks}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter remarks">
   
  </div>
  

 
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="pic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile">
    <img src="{{ asset('images/'.$record['pic']) }}" alt="IMG"  height="50px" width="50px" class="mt-2">
  </div>
 
  <button type="submit" class="btn btn-dark mt-2">Update</button>
</form>
  </div>
</div>
@endsection

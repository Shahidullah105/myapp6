@extends('layouts.master')
 
 @section('content')
  <!-- start page title --> 
  
  <div class="card">
   <div class="card-header">
     Add Category info
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
   <table class="table table-success table-striped table-bordered">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Name</th>
       <th scope="col">Remarks</th>
       <th scope="col">Image</th>
       <th scope="col">Operation</th>
     </tr>
   </thead>
   <tbody>
     @foreach ($all as $row )
     
    
     <tr>
       <th scope="row">{{$row['id']}}</th>
       <td>{{$row['name']}}</td>
       <td>{{$row['remarks']}}</td>
       <td>
       <img src="{{ asset('images/'.$row['pic']) }}" alt="IMG"  height="50px" width="50px">
       </td>
       <td>
       <a class="btn btn-success btn-sm" href="{{ url('/edit/category',$row->id) }}">Edit</a>
       <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ url('/delete',$row->id) }}">Delete</a> 
 </td>
     </tr>
     @endforeach
   </tbody>
 </table>
  
   </div>
 </div>
 @endsection
 
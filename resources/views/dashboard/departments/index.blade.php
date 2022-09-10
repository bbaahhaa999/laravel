@extends('layouts.dashboard')



@section('title','Departments')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Departments</li>
@endsection



@section('content')
<div class="mb-5">
  <a href="{{ route('dashboard.departments.create')}}" class="btn btn-sm btn-outline-primary">Create Department</a>
</div>

@if (session()->has('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
@endif
@if (session()->has('info'))
    <div class="alert alert-info">
      {{session('info')}}
    </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Created At</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    
    @forelse($departments as $department)
    <tr>
      <td>{{$department->id}}</td>
      <td>{{$department->name}}</td>
      <td>{{$department->description}}</td>
      <td>{{$department->created_at}}</td>
      <td>
        <a href="{{ route('dashboard.departments.edit',$department->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
      </td>
      <td>
        <form action="{{ route('dashboard.departments.destroy',$department->id)}}" method="post">
          @csrf
          {{-- <input type="hidden" name="_method" value="delete"> --}}
          @method('delete')
          <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
        <tr><td colspan="7">No Departments yet!</td></tr>
    
    @endforelse
  </tbody>
</table>


    
@endsection

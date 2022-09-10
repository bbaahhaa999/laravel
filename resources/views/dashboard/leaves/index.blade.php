@extends('layouts.dashboard')



@section('title','Leaves')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leaves</li>
@endsection



@section('content')
<div class="mb-5">
  <a href="{{ route('dashboard.leaves.create')}}" class="btn btn-sm btn-outline-primary">Create a Leave</a>
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
      <th>Leave Type</th>
      <th>Date From</th>
      <th>Date To</th>
      <th>Description</th>
      <th>Created At</th>
      <th>Status</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    
    @forelse($leaves as $leave)
    <tr>
      
      <td>{{$leave->id}}</td>
      <td>{{$leave->leave_type}}</td>
      <td>{{$leave->date_from}}</td>
      <td>{{$leave->date_to}}</td>
      <td>{{$leave->description}}</td>
      <td>{{$leave->created_at}}</td>
      <td class="text-info">{{$leave->status}}</td>
      <td>
        <a href="{{ route('dashboard.departments.edit',$leave->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
      </td>
      <td>
        <form action="{{ route('dashboard.departments.destroy',$leave->id)}}" method="post">
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

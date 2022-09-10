@extends('layouts.dashboard')



@section('title','Leave Type')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leave Type</li>
@endsection



@section('content')
<div class="mb-5">
  <a href="{{ route('dashboard.leaves.create')}}" class="btn btn-sm btn-outline-primary">Create Leave Type</a>
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
      <th>Description</th>
      <th>Date From</th>
      <th>Date To</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    
    @forelse($leavetypes as $leavetype)
    <tr>
      <td>{{$leavetype->id}}</td>
      <td>{{$leavetype->leave_type}}</td>
      <td>{{$leavetype->description}}</td>
      <td>{{$leavetype->date_from}}</td>
      <td>{{$leavetype->date_to}}</td>
      <td>
        <a href="{{ route('dashboard.leavetypes.edit',$leavetype->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
      </td>
      <td>
        <form action="{{ route('dashboard.leavetypes.destroy',$leavetype->id)}}" method="post">
          @csrf
          {{-- <input type="hidden" name="_method" value="delete"> --}}
          @method('delete')
          <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
        <tr><td colspan="7">No Leave Types yet!</td></tr>
    
    @endforelse
  </tbody>
</table>


    
@endsection

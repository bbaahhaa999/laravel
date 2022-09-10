@extends('layouts.dashboard')



@section('title','Edit Department')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leaves</li>
<li class="breadcrumb-item active">Edit</li>
@endsection



@section('content')
<form action="{{route('dashboard.leaves.update',$leaves->id)}}" method="post">
@csrf
@method('put')

<div class="form-group">
    <label for="">Leave Type</label>
    <input type="text" name="name" class="form-control" value="{{$leaves->leave_type}}">
</div>

<div class="form-group">
  <label for="">Description</label>
  <textarea type="text" name="description" class="form-control" value="">{{$leaves->leave_type}}</textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection

@extends('layouts.dashboard')



@section('title','Edit Leave Type')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leave Type</li>
<li class="breadcrumb-item active">Edit Leave Type</li>
@endsection



@section('content')
<form action="{{route('dashboard.leavetypes.update',$leavetypes->id)}}" method="post">
@csrf
@method('put')

<div class="form-group">
    <label for="">Leave Type</label>
    <input type="text" name="leave_type" class="form-control" value="{{$leavetypes->leave_type}}">
</div>

<div class="form-group">
  <label for="">Description</label>
  <textarea type="text" name="description" class="form-control" value="">{{$leavetypes->description}}</textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection

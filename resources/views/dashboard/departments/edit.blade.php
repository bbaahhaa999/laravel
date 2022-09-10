@extends('layouts.dashboard')



@section('title','Edit Department')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Departments</li>
<li class="breadcrumb-item active">Edit Department</li>
@endsection



@section('content')
<form action="{{route('dashboard.departments.update',$department->id)}}" method="post">
@csrf
@method('put')

<div class="form-group">
    <label for="">Department Name</label>
    <input type="text" name="name" class="form-control" value="{{$department->name}}">
</div>

<div class="form-group">
  <label for="">Department Name</label>
  <textarea type="text" name="description" class="form-control" value="">{{$department->description}}</textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection

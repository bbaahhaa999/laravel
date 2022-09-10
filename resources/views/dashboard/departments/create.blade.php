@extends('layouts.dashboard')



@section('title','Departments')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Departments</li>
@endsection



@section('content')


<form action="{{route('dashboard.departments.store')}}" method="post">
@csrf



<div class="form-group">
    <label for="">Department Name</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="form-group">
  <label for="">Department Name</label>
  <textarea type="text" name="description" class="form-control"></textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
@endsection

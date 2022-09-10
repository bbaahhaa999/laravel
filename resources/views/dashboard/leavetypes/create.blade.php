@extends('layouts.dashboard')



@section('title','Create Leave Type')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leave Type</li>
@endsection



@section('content')


<form action="{{route('dashboard.leavetypes.store')}}" method="post">
@csrf



<div class="form-group">
    <label for="">Leave Type</label>
    <input type="text" name="leave_type" class="form-control">
</div>

<div class="form-group">
  <label for="">Description</label>
  <textarea type="text" name="description" class="form-control"></textarea>
</div>

<div class="form-group col-md-6">
  <label>Date From</label>
  <input name="date_from" class="form-control" type="date">
</div>

<div class="form-group col-md-6">
  <label>Date To</label>
  <input name="date_to" class="form-control" type="date">
</div>

<div class="form-group">
  <button type="submit" class="btn btn-primary">Save</button>
</div>


</form>
@endsection

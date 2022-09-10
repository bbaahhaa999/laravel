@extends('layouts.dashboard')



@section('title','Create Leave')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Leaves</li>
@endsection



@section('content')


<form action="{{route('dashboard.leaves.store')}}" method="post">
@csrf



<label for="dep">Select ur Department</label>
           <select class="form-control my-2" name="leave_type">
           <option value="">--Select leavetypes--</option>
                    @foreach ($leavetypes as $leavet)
                        <option value="{{$leavet->id}}">{{$leavet->leave_type}}</option>
                    @endforeach             
            </select>

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

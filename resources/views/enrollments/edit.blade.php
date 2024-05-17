@extends('layout')

@section('content')
<div class="card">
    <h5 class="card-title">Edit Page</h5>
    <div class="card-body">
        <form action="{{ url('enrollments/' . $enrollments->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <label>Enroll No</label></br>
            <input type="text" name="enroll_no" id="enroll_no" value="{{$enrollments->enroll_no}}" class="form-control"></br>
            <label>Batch</label>
            <input type="text" name="batch_id" id="batch_id" value="{{$enrollments->batch_id}}" class="form-control"></br>
            <label>Student</label>
            <input type="text" name="student_id" id="student_id" value="{{$enrollments->student_id}}" class="form-control"></br>
            <label>Join Date</label>
            <input type="text" name="join_date" id="join_date" value="{{$enrollments->join_date}}" class="form-control"></br>
            <label>Fee</label>
            <input type="text" name="fee" id="fee" value="{{$enrollments->fee}}" class="form-control"></br>
            <input type="submit" value="save" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop
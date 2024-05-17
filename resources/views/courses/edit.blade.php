@extends('layout')

@section('content')
<div class="card">
    <h5 class="card-title">Courses Edit</h5>
    <div class="card-body">
        <form action="{{ url('courses/' . $courses->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" value="{{$courses->id}}" id="id">
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$courses->name}}" class="form-control">
            <label>Syllabus</label></br>
            <input type="text" name="syllabus" id="syllabus" value="{{$courses->syllabus}}" class="form-control">
            <label>Duration</label></br>
            <input type="text" name="duration" id="duration" value="{{$courses->duration}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop
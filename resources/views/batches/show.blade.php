@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Batche View</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Name : {{ $batches->name }}</h5>
            <p class="card-text">Course id : {{ $batches->course_id }}</p>
            <p class="card-text">Start Date : {{ $batches->start_date }}</p>
        </div>
        <hr>
    </div>
</div>
@endsection
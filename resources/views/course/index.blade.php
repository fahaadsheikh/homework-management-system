@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>All Courses</h2>
            <hr>
        </div>
        @foreach ($courses as $course)
            @include('partials.panel.course')
        @endforeach
    </div>
</div>
@endsection

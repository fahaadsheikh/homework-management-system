@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-6"><h2>All Courses</h2></div>
                <div class="col-md-6">
                    <h2><span class="pull-right"><a href="courses/create" class="btn btn-primary">Create A New Course</a></h2></span>
                </div>
            </div>
            <hr>
        </div>
        @foreach ($courses as $course)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ $course->path() }}">
                            <h4>{{ $course->title }}</h4>
                        </a>
                    </div>
                    <div class="panel-body">
                        <article>
                                <p>{{ $course->body }}</p>
                        </article>
                    </div>
                    @include('partials.panel.footer', [
                        'creator_name' => $course->creator->name,
                        'update_at' => $course->updated_at->diffForHumans()
                        ])
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

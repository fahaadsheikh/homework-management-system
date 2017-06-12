@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <article>
                        <h3>{{ $course->title }}</h3>
                    </article>
                </div>
            </div>
        </div>
    </div>
<!--     <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                {{--@foreach ($course->batch as $batch)
                    <article>
                        <a href="{{ $course->path() }}">
                            <h3>{{ $batch->title }}</h3>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div> -->--}}
    </div>
</div>
@endsection

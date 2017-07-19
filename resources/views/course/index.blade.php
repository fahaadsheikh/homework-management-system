@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('partials.elements.title-with-add-button', [
                'plural' => 'Courses',
                'singular' => 'Course',
                'url' => 'create'
            ])
        </div>
        @foreach ($courses as $course)
            <div class="col-md-10 col-md-offset-1">
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

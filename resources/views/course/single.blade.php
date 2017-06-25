@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $course->title }}</h3></div>
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
    </div>
    <div class="row">
        @foreach ($course->batches as $batch)
            @include('partials.loops.batch-loop')
        @endforeach       
    </div>
</div>
@endsection

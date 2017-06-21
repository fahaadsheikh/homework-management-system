@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $event->title }}</h3></div>
                <div class="panel-body">
                    <article>
                        <p>{{ $event->body }}</p>
                    </article>
                </div>
                @include('partials.panel-footer', ['parent' => $event])
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($event->batches as $batch)
            @include('partials.loops.batch-loop')
        @endforeach       
    </div>
</div>
@endsection

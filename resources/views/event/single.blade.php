@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $event->title }}</h3></div>
                <div class="panel-body">
                    <article>
                        <h3>{{ $event->body }}</h3>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($event->batches as $batch)
            @include('partials.batch-loop')
        @endforeach       
    </div>
</div>
@endsection

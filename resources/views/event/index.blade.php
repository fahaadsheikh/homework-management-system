@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>All Events</h2>
            <hr>
        </div>
        @foreach ($events as $event)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ $event->path() }}">
                            <h4>{{ $event->title }}</h4>
                        </a>
                    </div>
                    <div class="panel-body">
                        <article>
                                <p>{{ $event->body }}</p>
                            </a>
                        </article>                    
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

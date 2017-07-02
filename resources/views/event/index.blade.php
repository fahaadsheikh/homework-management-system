@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-6"><h2>All Events</h2></div>
                <div class="col-md-6">
                    <h2><span class="pull-right"><a href="events/create" class="btn btn-primary">Create A New Event</a></h2></span>
                </div>
            </div>
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
                        </article>              
                    </div>
                    @include('partials.panel.footer', [
                        'creator_name' => $event->creator->name,
                        'update_at' => $event->updated_at->diffForHumans()
                        ])
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @include('partials.elements.title-with-add-button', [
                    'plural' => 'Events',
                    'singular' => 'Event',
                    'url' => 'create'
                ])
        </div>
        @foreach ($events as $event)
            <div class="col-md-10 col-md-offset-1">
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

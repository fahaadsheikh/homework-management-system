@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upcoming Events</div>
                <div class="panel-body">
                    @foreach ($events as $event)
                        <article>
                            <a href="{{ $event->path() }}">
                                <h3>{{ $event->title }}</h3>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

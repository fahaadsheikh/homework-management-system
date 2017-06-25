@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>All Events</h2>
            <hr>
        </div>
        @foreach ($events as $event)
            @include('partials.panel.event')
        @endforeach
    </div>
</div>
@endsection

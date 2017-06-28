@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.panel.batch')
    </div>
    <div class="row">
        @foreach ($batch->participant as $participant)
            @include('partials.panel.participant')
        @endforeach
    </div>
</div>
@endsection

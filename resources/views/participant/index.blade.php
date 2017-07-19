@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('partials.elements.title-with-add-button', [
                'plural' => 'Participants',
                'singular' => 'Participant',
                'url' => 'create'
            ])
        </div>
    </div>
    <div class="row">
        @foreach ($participants as $participant)
            @include('partials.panel.participant')
        @endforeach
    </div>
</div>
@endsection
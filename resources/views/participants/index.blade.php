@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($participants as $participant)
            @include('partials.panel.participant')
        @endforeach
    </div>
</div>
@endsection

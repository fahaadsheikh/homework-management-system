@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.panel.event')
    </div>
    <div class="row">
        @foreach ($event->batches as $batch)
            @include('partials.panel.batch')
        @endforeach       
    </div>
    @include('partials.forms.addBatch')
</div>
@endsection

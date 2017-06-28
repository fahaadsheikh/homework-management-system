@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.panel.course')
    </div>
    <div class="row">
        @foreach ($course->batches as $batch)
            @include('partials.panel.batch')
        @endforeach       
    </div>
    @include('partials.forms.addBatch')
    </div>
</div>
@endsection

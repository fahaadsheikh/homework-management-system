@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($batches as $batch)
        @include('partials.panel.batch')
    @endforeach
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.panel.batch-loop')
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Participants</div>
                <div class="panel-body">
                    @foreach ($batch->participant as $participant)
                        @include('partials.panel.batch')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

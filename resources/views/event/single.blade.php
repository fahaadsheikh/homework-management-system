@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <article>
                        <h3>{{ $event->title }}</h3>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @foreach ($event->batches as $batch)
                        <article>
                             <h3>{{ $batch->id }} - {{ $batch->start_date }}</h3>
                        </article>
                    @endforeach
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ $event->path() }}">
                        <h4>{{ $event->title }}</h4>
                    </a>
                </div>
                <div class="panel-body">
                    <article>
                            <p>{{ $event->body }}</p>
                    </article>              
                </div>
                @include('partials.panel.footer', [
                    'creator_name' => $event->creator->name,
                    'update_at' => $event->updated_at->diffForHumans()
                    ])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('batch.batch-form')
            
            @foreach ($event->batches as $batch)
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{url()->current().'/'.$batch->path()}}">Batch ID: {{ $batch->id }}</a></div>
                    @include('partials.panel.footer', [
                        'creator_name' => $batch->creator->name,
                        'update_at' => $batch->updated_at->diffForHumans()
                        ])
                </div>
            @endforeach
        </div>   
    </div>
</div>
@endsection



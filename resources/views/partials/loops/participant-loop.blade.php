<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $participant->first_name }} {{ $participant->last_name }}</div>
        @include('partials.panel-footer', ['parent' => $participant])
    </div>
</div>
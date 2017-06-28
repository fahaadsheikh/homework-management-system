<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><a href="{{url()->current().'/'.$batch->path()}}">Batch ID: {{ $batch->id }}</a></div>
        <div class="panel-body">
            <article>
                    <p>Start Date: {{ $batch->start_date }}</p>
                    <p>End Date: {{ $batch->end_date }}</p>
                    <p>Start Time: {{ $batch->start_time }}</p>
                    <p>End Time: {{ $batch->end_time }}</p>
                    <p>Start Day: {{ $batch->start_day }}</p>
                    <p>End Day: {{ $batch->end_day }}</p>
            </article>
        </div>
        @include('partials.panel.footer', [
            'creator_name' => $batch->creator->name,
            'update_at' => $batch->updated_at->diffForHumans()
            ])
    </div>
</div>
<div class="col-md-8 col-md-offset-2">
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
        @include('partials.panel-footer', ['parent' => $event])
    </div>
</div>
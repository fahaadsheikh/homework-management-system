<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ $course->path() }}">
                <h4>{{ $course->title }}</h4>
            </a>
        </div>
        <div class="panel-body">
            <article>
                    <p>{{ $course->body }}</p>
            </article>
        </div>
        @include('partials.panel.footer', [
            'creator_name' => $course->creator->name,
            'update_at' => $course->updated_at->diffForHumans()
            ])
    </div>
</div>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">{{ $participant->first_name }}</div>
        <div class="panel-body">
            @foreach ($participants as $participant)
                <article>
                    <p>{{ $participant->first_name }}</p>
                </article>
            @endforeach
        </div>
    </div>
</div>
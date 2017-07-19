<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
        	<a href="{{ $participant->path() }}">
        	    {{ $participant->first_name }} {{ $participant->last_name }}
        	</a>
        </div>
        @include('partials.panel.footer', [
            'creator_name' => $participant->creator->name,
            'update_at' => $participant->updated_at->diffForHumans()
            ])
    </div>
</div>
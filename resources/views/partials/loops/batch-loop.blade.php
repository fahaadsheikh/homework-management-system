<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="text-left">
				<a href="{{$batch->path()}}" class="">
					Batch Number: {{ $batch->id }}
				</a>
			</span>
		</div>
		@include('partials.panel.footer', [
		    'creator_name' => $batch->creator->name,
		    'update_at' => $batch->updated_at->diffForHumans()
		    ])
	</div>
</div>

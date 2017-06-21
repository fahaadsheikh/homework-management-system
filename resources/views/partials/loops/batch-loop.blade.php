<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="text-left">
				<a href="{{$batch->path()}}" class="">
					Batch Number: {{ $batch->id }}
				</a>
			</span>
			<span class="pull-right">
				Published: {{ $batch->created_at->diffForHumans() }}
			</span>
		</div>
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
	</div>
</div>

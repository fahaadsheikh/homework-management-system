<div class="panel-footer">
	<span class="pull-left small">
        Created By: {{ $parent->creator->name }}
	</span>
    <span class="pull-right small">
        Last Updated: {{ $parent->updated_at->diffForHumans() }}
    </span>
    <div class="clearfix"></div>
</div>
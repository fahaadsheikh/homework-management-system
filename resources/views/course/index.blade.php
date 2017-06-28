@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>All Courses</h2>
            <hr>
        </div>
        @foreach ($courses as $course)
            @include('partials.panel.course')
        @endforeach
    </div>
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<h5><strong>Add a Course</strong></h5>
    		<hr>
	    	<form method="POST" action="courses">
	    		{{ csrf_field() }}
	    		<div class="form-group">
    	    		<input type="text" class="form-control" name="title" id="title" placeholder="Course Title">
    	    	</div>
    	    	<div class="form-group">	
    	    		<input type="text" class="form-control" name="country" id="country" placeholder="Country">
    	    	</div>
    	    	<div class="form-group">	
    	    		<input type="text" class="form-control" name="city" id="city" placeholder="City">
    	    	</div>
    	    	<div class="form-group">	
    	    		<input type="text" class="form-control" name="address" id="address" placeholder="Address">
    	    	</div>
    	    	<div class="form-group">	
    	    		<textarea class="form-control" name="body" id="body" rows="5" placeholder="Course Description"></textarea>
    	    	</div>
    	    	<input type="submit" class="btn btn-primary">
	    	</form>
		</div>    
    </div>
</div>
@endsection

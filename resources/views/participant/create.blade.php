@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h5><strong>Add a Participant</strong></h5>
			<hr>
	    	<form method="POST" action="{{url('participants')}}">
	    		{{ csrf_field() }}
	    		<div class="form-group">
		    		<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
		    	</div>
		    	<div class="form-group">	
		    		<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
		    	</div>
		    	<div class="form-group">	
		    		<input type="text" class="form-control" name="email" id="email" placeholder="Email">
		    	</div>
		    	<div class="form-group">	
		    		<input type="tel" class="form-control" name="contact_no" id="contact_no" placeholder="Contact Number">
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
		    	<input type="submit" class="btn btn-primary">
	    	</form>
		</div>    
	</div>
</div>
@endsection
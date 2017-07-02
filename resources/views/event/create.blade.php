@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h5><strong>Create a New Event</strong></h5>
            <hr>
            <form method="POST" action="{{url('events')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Event Title">
                </div>
                <div class="form-group">    
                    <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}" placeholder="Country">
                </div>
                <div class="form-group">    
                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="City">
                </div>
                <div class="form-group">    
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Address">
                </div>
                <div class="form-group">    
                    <textarea class="form-control" name="body" id="body" rows="5" placeholder="Event Description">{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
                @if (count($errors))
                    <ul class="alert alert-danger">
                        <div class="container">
                            @foreach($errors->all() as $error)
                                <li class="list-item">{{ $error }}</li>
                            @endforeach
                        </div>
                    </ul>
                @endif
            </form>
        </div>    
    </div>
</div>
@endsection

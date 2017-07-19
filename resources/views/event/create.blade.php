@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h5><strong>Create a New Event</strong></h5>
            <hr>
            <form method="POST" action="{{url('events')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                </div>
                <div class="form-group">    
                    <textarea class="form-control" name="body" id="body" rows="15" placeholder="Body">{{ old('body') }}</textarea>
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

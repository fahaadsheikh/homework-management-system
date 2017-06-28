@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.panel.course')
    </div>
    <div class="row">
        @foreach ($course->batches as $batch)
            @include('partials.panel.batch')
        @endforeach       
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h5><strong>Add a Batch to this course</strong></h5>
            <hr>
            <form method="POST" action="{{url()->current().'/batch'}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="start_date">Starting Date for this batch</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Starting Date for this batch">
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="end_date">Ending Date for this batch</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Ending Date for this batch">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="start_time">Starting time for this batch</label>
                            <input type="time" class="form-control" name="start_time" id="start_time" placeholder="Starting time for this batch">
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="end_time">Ending time for this batch</label>
                            <input type="time" class="form-control" name="end_time" id="end_time" placeholder="Ending time for this batch">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="start_day">Starting day for this batch</label>
                            <select class="form-control" name="start_day" id="start_day"> 
                                <option value="" selected>Select</option>                              
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="end_day">Ending day for this batch</label>
                            <select class="form-control" name="start_day" id="start_day"> 
                                <option value="" selected>Select</option>                              
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <input type="number" class="form-control" name="price" id="price" placeholder="Price for this batch">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>    
    </div>
</div>
@endsection

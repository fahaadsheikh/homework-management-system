<span class="pull-left">
    <h3>All Batches</h3>
</span>
<span class="pull-right">
    <h3>
        <a data-toggle="collapse" data-parent="#accordion" class="btn btn-primary btn-sm" href="#collapseOne">
            New Batch
        </a>
    </h3>
</span>
<div class="clearfix">...</div>            
<hr>


<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div id="collapseOne" class="panel-collapse collapse {{ count($errors) ? 'in' : '' }}">
            <div class="panel-body">
                <form method="POST" action="{{url()->current()}}/batch">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="city">City</label>   
                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>    
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="start_date">Starting Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}"  placeholder="Starting Date">
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="end_date">Ending Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" placeholder="Ending Date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="start_time">Starting time</label>
                                <input type="time" class="form-control" name="start_time" id="start_time" value="{{ old('start_time') }}" placeholder="Starting time">
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="end_time">Ending time</label>
                                <input type="time" class="form-control" name="end_time" id="end_time" value="{{ old('end_time') }}" placeholder="Ending time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="start_day">Starting day</label>
                                <select class="form-control" name="start_day" id="start_day"> 
                                    <option value="" selected>Select</option>    
                                    <option value="monday" {{ old("start_day") == 'monday' ? "selected":"" }}>Monday</option>
                                    <option value="tuesday" {{ old("start_day") == 'tuesday' ? "selected":"" }}>Tuesday</option>
                                    <option value="wednesday" {{ old("start_day") == 'wednesday' ? "selected":"" }}>Wednesday</option>
                                    <option value="thursday" {{ old("start_day") == 'thursday' ? "selected":"" }}>Thursday</option>
                                    <option value="friday" {{ old("start_day") == 'friday' ? "selected":"" }}>Friday</option>
                                    <option value="saturday" {{ old("start_day") == 'saturday' ? "selected":"" }}>Saturday</option>
                                    <option value="sunday" {{ old("start_day") == 'sunday' ? "selected":"" }}>Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="end_day">Ending day</label>
                                <select class="form-control" name="end_day" id="end_day"> 
                                    <option value="" selected>Select</option>    
                                    <option value="monday" {{ old("end_day") == 'monday' ? "selected":"" }}>Monday</option>
                                    <option value="tuesday" {{ old("end_day") == 'tuesday' ? "selected":"" }}>Tuesday</option>
                                    <option value="wednesday" {{ old("end_day") == 'wednesday' ? "selected":"" }}>Wednesday</option>
                                    <option value="thursday" {{ old("end_day") == 'thursday' ? "selected":"" }}>Thursday</option>
                                    <option value="friday" {{ old("end_day") == 'friday' ? "selected":"" }}>Friday</option>
                                    <option value="saturday" {{ old("end_day") == 'saturday' ? "selected":"" }}>Saturday</option>
                                    <option value="sunday" {{ old("end_day") == 'sunday' ? "selected":"" }}>Sunday</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" value="Create" class="btn btn-primary">
                    </div>
                    <div class="clearfix"></div>
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
</div>

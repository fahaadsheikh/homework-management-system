<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Course;
use App\Event;

class BatchControllerForEvents extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Batch $batch)
    {
        $batch = $batch->load('creator', 'participant','participant.creator');
        return view('batch.index', compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $batchparent)
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {

        $this->validate($request, [
            'country'       => 'required',
            'city'          => 'required',
            'address'       => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'start_day'     => 'required',
            'end_day'       => 'required',
            'price'         => 'required'
            ]);

        $event->addBatch([
            'user_id'       => auth()->id(),
            'parent_id'     => $event->id,
            'parent_type'   => 'App\Event',
            'country'       => request('country'),
            'city'          => request('city'),
            'address'       => request('address'),
            'start_date'    => request('start_date'),
            'end_date'      => request('end_date'),
            'start_time'    => request('start_time'),
            'end_time'      => request('end_time'),
            'start_day'     => request('start_day'),
            'end_day'       => request('end_day'),
            'price'         => request('price'),
            ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Batch $batch)
    {
        $batch->load('creator', 'participant','participant.creator');
        return view('batch.single', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}

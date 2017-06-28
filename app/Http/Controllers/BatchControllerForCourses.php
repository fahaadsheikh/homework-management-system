<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Course;
use App\Event;

class BatchControllerForCourses extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Batch $batch)
    {
        $batches = $batch->load('creator', 'participant','participant.creator');
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $course->addBatch([
            'user_id'       => auth()->id(),
            'parent_id'     => request('parent_id'),
            'parent_type'   => request('parent_type'),
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
    public function show(Course $course, Batch $batch)
    {
        $batch->load('creator', 'participant','participant.creator');
        return view('batches.single', compact('batch'));
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

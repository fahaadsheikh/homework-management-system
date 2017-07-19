<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    /**
     * Create a new controller instance.
     * User needs to be logged in to view
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $participants = Participant::with('creator')->get();
        return view('participant.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Participant $participant)
    {
        $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name'  => 'required|max:255',
                'email'  => 'required|string|max:255',
                'contact_no'  => 'required|max:255',
                'country'  => 'required|max:255',
                'city'  => 'required|max:255',
                'address'  => 'required',

            ]);

        Participant::create([
            'user_id'       => auth()->id(),
            'first_name'    => request('first_name'),
            'last_name'     => request('last_name'),
            'email'         => request('email'),
            'contact_no'    => request('contact_no'),
            'country'       => request('country'),
            'city'          => request('city'),
            'address'       => request('address')
            ]);
        return redirect()->route('participants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}

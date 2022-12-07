<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Trips/Index', [
           'trips' => Trip::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Trips/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $data = $request->only(['title', 'description']);

        $data['user_id'] = $request->user()->id;

        $trip = Trip::create($data);

        return redirect()->route('trips.show', $trip->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Inertia\Response
     */
    public function show(Trip $trip)
    {
        return Inertia::render('Trips/Show', [
            'trip' => $trip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Inertia\Response
     */
    public function edit(Trip $trip)
    {
        return Inertia::render('Trips/Update', [
            'trip' => $trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Trip $trip)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $trip->title = $request->get('title');
        $trip->description = $request->get('description');

        $trip->save();
        return redirect()->route('trips.show', $trip->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trips.index');
    }
}

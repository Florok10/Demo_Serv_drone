<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('pages/event-index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create-event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'                 => "required|string|max:250|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
            'place'                 => "required|string|max:250|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
            'date_start'            => 'required',
            'date_end'              => 'required',
            'description'           => "required|string|max:800|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
        ]);

        $event = new Event();

        $event->title = $request->title;
        $event->place = $request->place;
        $event->date = 'Du ' . $request->date_start . ' au ' . $request->date_end;
        $event->description = $request->description;
        $event->save();

        return redirect('/panel-admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('pages/event-show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/event_edit', compact(Event::findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'                 => "required|string|max:250|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
            'place'                 => "required|string|max:250|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
            'date_start'            => 'required',
            'date_end'              => 'required',
            'description'           => "required|string|max:800|regex:^\s*[a-zA-Z0-9éèàê\s'.,]+\s*$^",
        ]);

        $event = Event::findOrFail($id);

        $event->title = $request->title;
        $event->place = $request->place;
        $event->date = 'Du ' . $request->date_start . ' au ' . $request->date_end;
        $event->description = $request->description;
        $event->save();

        return redirect('/panel-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}

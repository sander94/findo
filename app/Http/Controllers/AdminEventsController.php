<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\OpeningTimes;
use App\Regions;
use Intervention\Image\Facades\Image as Image;


class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('is_promoted', 'DESC')->orderBy('date', 'ASC')->get();
        return view('admin.events.index', compact('events', $events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Regions::all();
        $openingtimes = OpeningTimes::all();
        return view('admin.events.create', compact(['openingtimes', 'regions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Events::create($request->all());
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::find($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $openingtimes = OpeningTimes::all();
        $event = Events::find($id);
        $regions = Regions::all();
        return view('admin.events.edit', compact(['event', 'openingtimes', 'regions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Events::find($id)->update($request->all());
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

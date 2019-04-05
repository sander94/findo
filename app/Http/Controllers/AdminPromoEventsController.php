<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\OpeningTimes;
use Intervention\Image\Facades\Image as Image;


class AdminPromoEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all()->where('is_promoted', '1');
        return view('admin.events.indexPromoEvent', compact('events', $events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $openingtimes = OpeningTimes::all();
        return view('admin.events.createPromoEvent', compact('openingtimes'));
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
        return redirect()->route('events.indexPromoEvent');
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
        return view('admin.events.showPromoEvent', compact('event'));
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
        return view('admin.events.editPromoEvent', compact(['event', 'openingtimes']));
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
        return redirect()->route('events.indexPromoEvent');
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

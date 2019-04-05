<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class MainController extends Controller
{
   	public function index()
    {
    	$events = Events::all();
        $promoevents = Events::all()->where('is_promoted', '1');
        return view('frontpage', compact('events', $events), compact('promoevents', $promoevents));
    }


   	public function showEvent($id)
    {
    	$event = Events::find($id);
        return view('event', compact('event'));
    }

}

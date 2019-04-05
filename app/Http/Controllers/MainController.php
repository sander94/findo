<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class MainController extends Controller
{
   	public function index()
    {
    	$events = Events::all();
        return view('frontpage', compact('events', $events));
    }


   	public function showEvent($id)
    {
    	$event = Events::find($id);
        return view('event', compact('event'));
    }

}

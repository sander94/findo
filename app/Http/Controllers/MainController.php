<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Months;
use App\Regions;
use App\Tags;

class MainController extends Controller
{
   	public function index(Request $request)
    {
   
        
if(!empty($request->region)) {
$currentRegion = Regions::where('id', $request->region)->first();
$currentRegion = $currentRegion->region;
}
else { $currentRegion = "Asukoht"; }


if(!empty($request->month)) {
$currentMonth = Months::where('number', $request->month)->first();
$currentMonth = $currentMonth->number;
}
else { 
$currentMonth = date('m');
}

if(!empty($request->year)) {
    $currentYear = $request->year;
}
else {
$currentYear = date('Y');
}



        $events = Events::where('is_active', 1)->where('date', '>=', date('Y-m-d'));
        if ($request->has('month')) {
            $events->whereMonth('date', $request->month);
        }
        else {
            $events->whereMonth('date', date('m'));
        }
        if ($request->has('year')) {
            $events->whereYear('date', $request->year);
        }
        else {
            $events->whereYear('date', date('Y'));
        }
        if ($request->has('region')) {
            $events->where('region', $request->region);
        }
        if ($request->has('tag')) {
           
        }
        
        $events->orderBy('date');
        $events = $events->get();


        $regionals = Regions::all();
        $months = Months::all();
        $tags = Tags::all();


        $promoevents = Events::all()->where('is_promoted', '1');
       
        return view('frontpage', compact('events', 'promoevents', 'regionals', 'currentRegion', 'months', 'currentMonth', 'currentYear', 'tags'))->with('og_image', '')->with('og_title', 'Findo.ee')->with('og_description', 'Findost leiad ürituse!');
    }


   	public function showEvent($id)
    {
    	$event = Events::find($id);
        $ogImage = "https://findo.ee/images/events/thumb/".$event->image;
        return view('event', compact('event'))->with('og_image', $ogImage)->with('og_title', $event->title)->with('og_description', $event->description );
    }

}

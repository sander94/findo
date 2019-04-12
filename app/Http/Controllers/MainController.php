<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Regions;

class MainController extends Controller
{
   	public function index(Request $request)
    {
   
        
if(!empty($request->region)) {
$currentRegion = Regions::where('id', $request->region)->first();
$currentRegion = $currentRegion->region;
}
else { $currentRegion = "Vali asukoht"; }

        $events = Events::where('is_promoted', '0');
        if ($request->has('month')) {
            $events->whereMonth('date', $request->month);
        }
        else {
            $events->whereMonth('date', date('m'));
        }
        if ($request->has('region')) {
            $events->where('region', $request->region);
        }
        $events->orderBy('date');
        $events = $events->get();


        $regionals = Regions::all();
 



        $promoevents = Events::all()->where('is_promoted', '1');
       
        return view('frontpage', compact('events', 'promoevents', 'regionals', 'currentRegion'));
    }


   	public function showEvent($id)
    {
    	$event = Events::find($id);
        return view('event', compact('event'));
    }

}

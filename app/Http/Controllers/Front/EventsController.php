<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Event;
use App\Models\EventExtraData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Log;


class EventsController extends Controller
{
    public function index(Request $request, $isTest = false) {
        $now_obj = Carbon::now();
        $now_db_date = $now_obj->format('Y-m-d');
    
        // Check if isTest parameter is available and set to true
        
        if ($isTest == true) {
            // Get all events
            $resources = Event::where('end_date', '>=', $now_db_date)
                ->where('visibility', 'visible')->get();
        } else {
            // Get all events except with id 48 and 50
            $resources = Event::where('end_date', '>=', $now_db_date)
                ->where('visibility', 'visible')
                ->whereNotIn('id', [48, 50])->get();
        }
    
        $data = [
            'page_title' => 'Events and Trainings',
            // 'countries' => Country::all()
            'resources' => $resources,
            'active_events' => $resources->count()
        ];
    
        return view('frontend.pages.events', $data);
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        $event_extra_data = EventExtraData::where('event_id', $id)->get();
        // return $event_extra_data;

        return view('frontend.pages.event-single', ['event' => $event, 'extra_data' => $event_extra_data]);

    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = env('SITE_NAME') . ' - Dashboard';
        $section_title = 'Dashboard';

        $registrations = EventRegistration::join('event_payments',
                'event_payments.registrant_id', '=', 'event_registrations.id'
            )
            ->where('event_payments.payment_status', 1)
            ->count();

        $data = [
            'page_title'        => $page_title,
            'section_title'     => $section_title,
            'num_subscribers'   => $registrations,
            'events'   => Event::all()->count()
        ];



        return view('backend.dashboard', $data);
    }
}

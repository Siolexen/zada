<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('events.index');
    }

    public function create(){
        return view('events.create');
    }

    public function edit(){
        return view('events.create');
    }

    public function store(StoreEventRequest $request){

        $eventService = new EventService();

        if($eventService->create($request)) {
            return Redirect::back()->with('status', 'Event dodany');
        }else{
            return Redirect::back()->with('status', 'Error');
        }
    }

    public function update(StoreEventRequest $request){

        $eventService = new EventService();

        if($eventService->update($request)) {
            return Redirect::back()->with('status', 'Event zaaktualizowny');
        }else{
            return Redirect::back()->with('status', 'Error');
        }
    }
}

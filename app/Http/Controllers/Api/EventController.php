<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::with('user')->get();
//dd($events);
        return json_encode(
            [
                'events' => EventResource::collection($events)
            ]
        );
    }

    public function create(){
        return view('events.create');
    }



    public function store(StoreEventRequest $request){
        $input = $request->all();
        $input['slug'] = \Str::snake($request->name, '-');
        if($event = Event::create($input)) {
            $event->user()->attach(auth()->user()->id);
            return Redirect::back()->with('status', 'Profile updated!');
        }else{
            return Redirect::back()->with('status', 'Error');
        }

    }
}

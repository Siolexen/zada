<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
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
        $input = $request->all();
        $input['slug'] = \Str::snake($request->name, '-');
        if($event = Event::create($input)) {
            $event->user()->attach(auth()->user()->id);
            return Redirect::back()->with('status', 'Profile updated!');
        }else{
            return Redirect::back()->with('status', 'Error');
        }

    }

    public function update(StoreEventRequest $request){
        $input = $request->all();
        $input['slug'] = \Str::snake($request->name, '-');
        if($event = Event::update($input)) {
            $event->user()->syncWithoutDetaching(auth()->user()->id);
            return Redirect::back()->with('status', 'Profile updated!');
        }else{
            return Redirect::back()->with('status', 'Error');
        }

    }
}

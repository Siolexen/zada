<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\Request;

class EventService
{
    public function create($request)
    {
        $input = $request->all();
        $input['slug'] = \Str::snake($request->name, '-');
        if($event = Event::create($input)) {
            $event->user()->attach(auth()->user()->id);
            return true;
        }
        return false;
    }

    public function update($request)
    {
        $input = $request->all();
        $input['slug'] = \Str::snake($request->name, '-');
        if($event = Event::update($input)) {
            $event->user()->syncWithoutDetaching(auth()->user()->id);
            return true;
        }
        return false;
    }
}

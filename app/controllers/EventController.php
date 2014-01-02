<?php

class EventController
extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Cache::remember("events", 15, function()
        {
            return Event::all();
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), [
            "name"        => "required",
            "description" => "required|min:10"
        ]);

        if ($validator->passes())
        {
            return Event::create([
                "name"        => Input::get("name"),
                "description" => Input::get("description"),
                "started_at"  => Input::get("started_at"),
                "ended_at"    => Input::get("ended_at")
            ]);
        }

        return $validator->errors();
    }

    /**
     * Display the specified resource.
     *
     * @param  Event  $event
     * @return Response
     */
    public function show($event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Event  $event
     * @return Response
     */
    public function update($event)
    {
        $event->name        = Input::get("name");
        $event->description = Input::get("description");
        $event->started_at  = Input::get("started_at");
        $event->ended_at    = Input::get("ended_at");
        $event->save();

        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event  $event
     * @return Response
     */
    public function destroy($event)
    {
        $event->delete();
        return Response::json(true);
    }

    public function total()
    {
        if (($total = Cache::get("events.total")) == null)
        {
            $total = Event::count();
            Cache::put("events.total", $total, 15);
        }

        return Response::json((int) $total);
    }

    public function today()
    {
        return Event::where(DB::raw("DAY(started_at)"), date("d"))->remember(15)->get();
    }
}
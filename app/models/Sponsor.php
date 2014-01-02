<?php

class Sponsor
extends Eloquent
{
    protected $table = "sponsor";

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function events()
    {
        return $this->belongsToMany("Event", "event_sponsor", "sponsor_id", "event_id");
    }
}

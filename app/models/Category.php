<?php

class Category
extends Eloquent
{
    protected $table = "category";

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function events()
    {
        return $this->belongsToMany("Event", "category_event", "category_id", "event_id");
    }
}

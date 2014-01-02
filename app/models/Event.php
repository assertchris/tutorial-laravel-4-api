<?php

class Event
extends Eloquent
{
    protected $table = "event";

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public function categories()
    {
        return $this->belongsToMany("Category", "category_event", "event_id", "category_id");
    }

    public function sponsors()
    {
        return $this->belongsToMany("Sponsor", "event_sponsor", "event_id", "sponsor_id");
    }

    public function setNameAttribute($value)
    {
        $this->attributes["name"] = preg_replace("/\W/", "", $value);
    }

    public function getDescriptionAttribute()
    {
        return trim($this->attributes["description"]);
    }

    protected $appends = ["hasCategories", "hasSponsors"];

    public function getHasCategoriesAttribute()
    {
        $hasCategories = $this->categories()->count() > 0;
        return $this->attributes["hasCategories"] = $hasCategories;
    }

    public function getHasSponsorsAttribute()
    {
        $hasSponsors = $this->sponsors()->count() > 0;
        return $this->attributes["hasSponsors"] = $hasSponsors;
    }
}

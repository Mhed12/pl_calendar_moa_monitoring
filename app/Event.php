<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //protected $table ='events';
    public $timestamps = false;
    protected $fillable = [
        'event_name', 'venue', 'contact_person', 'e_start_date', 'e_start_time', 'e_end_date', 'e_end_time', 'allDay',
    ];
}

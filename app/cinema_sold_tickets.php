<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cinema_sold_tickets extends Model
{
    //
    protected $fillable =[
        'checkpyment',
        'Movie_Name',
        'Cinema_Place',
        'Seat_id',
        'Seat_No',
        'Day',
        'Time',
        'amount',
        'Ticket_No'
];
}

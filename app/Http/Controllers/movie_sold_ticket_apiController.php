<?php

namespace App\Http\Controllers;


use App\cinema_sold_tickets;
use App\cinemaplace;
use App\Http\Resources\apiresource;

class movie_sold_ticket_apiController extends Controller
{
    //
    public function show($cinema): apiresource{
        $cinema_name ='';
        $cinema_com=cinemaplace::all()
                        ->where('cinema_id','=',$cinema);
        foreach($cinema_com as $cin){
            $cinema_name=$cin->Name;
        }
        
        $info=cinema_sold_tickets::all()
                        ->where('Cinema_Place','=',$cinema_name);
    return new apiresource($info);
    }
    
}

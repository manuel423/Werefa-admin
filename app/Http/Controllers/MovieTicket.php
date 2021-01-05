<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cinema_sold_tickets;

class MovieTicket extends Controller
{
    //
    public function index(){
        
        $chp=$_GET['id'];
        $cinema_sold_tickets=cinema_sold_tickets::all()
                                            ->where('checkpyment','=',$chp);
                                            $price=$_GET['TotalAmount'];
        return view('movieticket',[
            'movieinfo'=>$cinema_sold_tickets,
            'price'=>$price
        ]);

    }
} 

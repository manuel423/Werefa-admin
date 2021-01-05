<?php

namespace App\Http\Controllers;

use App\cinemaplace;
use App\movies;
use App\cinemaseat;
use App\cinemareport;
use App\movieinfo;
use App\seataddedbycinema;
use Illuminate\Http\Request;

class CinemaplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies =movies::all();
        $name=session()->get('cinema');
        $cinemaplace= cinemaplace::all()
                                    ->where('Name','=',$name);
        $movieschedule= movieinfo::all()
                                    ->where('cinema','=',$name);
        return view('addschedule',[
            'movie'=> $movies,
            'movieinfo'=> $movieschedule,
            'screens' => $cinemaplace
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        //
        if(session()->has('cinema')){
       $day=session()->get('Day');
       $time=session()->get('Time');
       $seats=$_POST['Selected_Seat'];
       $seat_id=$_POST['Seat_id']; 
       $qun=$_POST['quantity'];

       $cinemaseat= new seataddedbycinema;

       $cinemaseat->Movie_Name = session()->get('movie');
       $cinemaseat->Cinema_Place = session()->get('cinema');
       $cinemaseat->Day = $day;
       $cinemaseat->Time = $time;
       $cinemaseat->Seat_id = $seat_id;
       $cinemaseat->Seat_No = $seats;
       $cinemaseat->amount = $qun;
       $cinemaseat->save();
        }else{
            return redirect('/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        if(session()->has('cinema')){
            $name=session()->get('cinema');
            $soldinfo= cinemareport::all()
                                    ->where('Cinema_Place','=',$name);
    
            return view('index',[
                'sold' => $soldinfo,
            ]);
    
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function edit(cinemaplace $cinemaplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cinemaplace $cinemaplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(cinemaplace $cinemaplace)
    {
        //
    }
}

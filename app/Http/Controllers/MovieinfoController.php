<?php

namespace App\Http\Controllers;

use App\movieinfo;
use Illuminate\Http\Request;
use App\cinema_sold_tickets;
use App\seataddedbycinema;

class MovieinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('cinema')){
        $all=explode(',',$_POST['time']);
        $time=$all[0];
        $screen=$all[1];
        $day=$all[2];
        session(['Day' => $day]);
        session(['Time' => $time]);
        $soald_seats= cinema_sold_tickets::all()
                ->where('Movie_Name','=',session()->get('movie'))
                ->where('Cinema_Place','=',session()->get('cinema'))
                ->where('Day','=',$day)
                ->where('Time','=',$time);

        $cinema_soald= seataddedbycinema::all()
                ->where('Movie_Name','=',session()->get('movie'))
               ->where('Cinema_Place','=',session()->get('cinema'))
               ->where('Day','=',$day)
               ->where('Time','=',$time);
        return view('cinemamap',[
            'soldSeats' => $soald_seats,
            'cinemasoald' => $cinema_soald,
            'screen' => $screen,
            'cplace' => session()->get('cinema'),
        ]);
        }else{
            return redirect('/');
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function show(movieinfo $movieinfo)
    {
        //
        if(session()->has('cinema')){
            if(isset($_POST['name'])){
				
                if($_POST['name']!="choose"){
                    
                    $moviename=$_POST['name']; 
                    $cinemap=session()->get('cinema');
                    session(['movie'=>$moviename]);
                    $movieinfo=movieinfo::all()
                                        ->where('cinema','=',$cinemap)
                                        ->where('Movie','=',$moviename);
                    
                     if($movieinfo->count()>0){
                         return view('movieinfo',[
                             'movieinfos'=>$movieinfo,
                         ]);
                     }else{
                         echo "Schedule not found for this movie!!";
                     }
                 }else{
                     echo "You didn't choose cinema place!!";
                 }
            }
        }else{
            return redirect('/');
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(movieinfo $movieinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        //
        //$schedule= new Object();
        if(session()->has('cinema')){
        $cinema=session()->get('cinema');
        $movies=$_POST['name'];
        $schedule=json_encode($_POST['schedule']);
        $movsch= movieinfo::all()
                            ->where('Movie','=',$movies);

        if($movsch->count()>0){
            echo 0;
        }else{
            $movinfo= new movieinfo;

            $movinfo->cinema=$cinema;
            $movinfo->Movie=$movies;
            $movinfo->Schedule=$schedule;
            $movinfo->save();
            echo 'yes';
        }
    }else{
        return redirect('/');
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(movieinfo $movieinfo)
    {
        //
        $no=$_POST['movieinfo_id'];
        foreach($no as $n){
            $movieinfo->destroy($n);
        }
        
    }
}

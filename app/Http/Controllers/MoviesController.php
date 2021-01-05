<?php

namespace App\Http\Controllers;

use App\movies;
use Illuminate\Http\Request;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('cinema')){
        $type=$_SERVER["QUERY_STRING"];
        $movies =movies::all()
        ->where('Type','=',$type);
        return view('schedulemovie',[
            'movies' => $movies,
            ]);
        }else{
            return redirect('/');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(movies $movies)
    {
        if(session()->has('cinema')){
        $movies =movies::all();
        return view('sellmovies',[
            'movies' => $movies,
            ]);
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy(movies $movies)
    {
        //
    }
}

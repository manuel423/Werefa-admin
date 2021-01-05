<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cinemaplace;


class LoginController extends Controller
{
    public function index()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $cinemaplace=cinemaplace::all()
                                        ->where('username','=',$username)
                                        ->where('password','=',$password);
        
                                          
        if($cinemaplace->count()>0){
            foreach($cinemaplace as $c){
                 $name= $c->Name;  
            }
            session(['cinema'=>$name]);
            echo 1;
        }else{
            echo 0;
        }
         
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
 
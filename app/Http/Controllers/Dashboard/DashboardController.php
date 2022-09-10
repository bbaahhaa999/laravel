<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    //
    public function index(){
        
        $user = 'Baha HajAhmad';
        $title = 'Leaves';
        // return response: view,, json,, redirect,, file,, 
        // by default search in views folder
        // View::make('dashboard',[])
        //return response()->view('dashboard',[])
        return view('dashboard.index',compact('user','title'));
    }
}

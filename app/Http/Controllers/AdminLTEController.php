<?php

namespace App\Http\Controllers;

use App\User;
<<<<<<< HEAD
use Illuminate\Support\Facades\Cache;

=======
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
>>>>>>> a18ae92477605c00ddf7aa746f285cbef8eb6813

class AdminLTEController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('/index',compact('users'));
    }
<<<<<<< HEAD
=======

    protected function data_take()
    {
        /*
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $request = $client->get('https://data.epa.gov.tw/dataset/detail/AQX_P_319');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
        */
    }

>>>>>>> a18ae92477605c00ddf7aa746f285cbef8eb6813
}

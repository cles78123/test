<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;

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

}

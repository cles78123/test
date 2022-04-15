<?php

namespace App\Http\Controllers;

use Auth;
use App\Hamlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use \Cache;

class HamletController extends Controller
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
        $data = Hamlet::where('location','like','%'); 
        $location = $data->groupby('location')->get();
        $data =  $data->simplePaginate(15);
        return view('/hamlet' ,compact('location') ,compact('data'));
    }

    public function search(Request $keywords)
    {          
        $location = Hamlet::where('location','like','%')->groupby('location')->get(); 
        
        $listKey = "DATA:SEARCH:{$keywords->type}:{$keywords->calculate}:{$keywords->keyword}";
        $hashKey = "HASH:DATA:SEARCH:{$keywords->type}:{$keywords->calculate}:{$keywords->keyword}:";

        if(empty(Redis::exists($listKey))){
            if($keywords->location == '0'){
                $data_search_sql = Hamlet::where($keywords->type,$keywords->calculate,$keywords->keyword)
                ->simplePaginate(15);
            }else{
                $data_search_sql = Hamlet::where($keywords->type,$keywords->calculate,$keywords->keyword)
                ->where('location',$keywords->location)->simplePaginate(15);
            }
            foreach($data_search_sql as $key => $i){ 
                Redis::rpush($listKey,$key);
                Redis::hMset($hashKey.$key,array(
                    'location' => $data_search_sql[$key]["location"],
                    'created_at' => $data_search_sql[$key]["created_at"],
                    'number_neighbors' => $data_search_sql[$key]["number_neighbors"],
                    'number_households' => $data_search_sql[$key]["number_households"],
                    'boy' => $data_search_sql[$key]["boy"],
                    'girl' => $data_search_sql[$key]["girl"],
                    'population' => $data_search_sql[$key]["population"],
                    'born_population' => $data_search_sql[$key]["born_population"],
                    'death_population' => $data_search_sql[$key]["death_population"],
                    'marriages' => $data_search_sql[$key]["marriages"],
                    'divorce' => $data_search_sql[$key]["divorce"],
                    'move_in' => $data_search_sql[$key]["move_in"],
                    'move_out' => $data_search_sql[$key]["move_out"],
                ));
                Redis::expire($hashKey.$key,600);
                }
            Redis::expire($listKey,600);
            $list = Redis::lrange($listKey,0,-1);
            foreach($list as $v){
            $data_search[] = Redis::hGetall($hashKey.$v);
            }
        }else{
            $list = Redis::lrange($listKey,0,-1);
            foreach($list as $v){
            $data_search[] = Redis::hGetall($hashKey.$v);
            }
        }
        $data_search = json_decode(json_encode($data_search), FALSE);
        
        return view('/hamlet_search' ,compact('location') ,compact('data_search'));
    }   
}
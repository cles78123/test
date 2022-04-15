<?php

namespace App\Console\Commands;

use App\Hamlet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class Redis_life extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis_life:take';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Hamlet::max('created_at');
        $data = Hamlet::where('created_at',$date)->get(); 

        $listKey = 'DATA:LIST';
        $hashKey = 'HASH:DATA:LIST:';

        foreach($data as $key => $i){ 
            Redis::rpush($listKey,$key);
            Redis::hMset($hashKey.$key,array(
                'location' => $data[$key]["location"],
                'created_at' => $data[$key]["created_at"],
                'number_neighbors' => $data[$key]["number_neighbors"],
                'number_households' => $data[$key]["number_households"],
                'boy' => $data[$key]["boy"],
                'girl' => $data[$key]["girl"],
                'population' => $data[$key]["population"],
                'born_population' => $data[$key]["born_population"],
                'death_population' => $data[$key]["death_population"],
                'marriages' => $data[$key]["marriages"],
                'divorce' => $data[$key]["divorce"],
                'move_in' => $data[$key]["move_in"],
                'move_out' => $data[$key]["move_out"],
            ));
            Redis::expire($hashKey.$key,600);
        }
        Redis::expire($listKey,600);
       
    }
}

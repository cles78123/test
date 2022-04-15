<?php

namespace App\Console\Commands;

use App\Hamlet;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use File;

class Opendata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opendata:take';

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
        //使用Guzzle
        $client = new \GuzzleHttp\Client();
        $res =  $client->request('GET', 'https://ws.kinmen.gov.tw/001/Upload/0/relfile/0/0/2c102756-7365-422b-8357-d8b98f9e5695.json');
        //格式轉換
        $load = json_decode($res->getBody()->getContents(),true);
        //塞入資料庫
        foreach ($load as $key => $i){
            Hamlet::create([
                'location' => $load[$key]["村別數"],
                'number_neighbors' => $load[$key]["鄰數"],
                'number_households' => $load[$key]["戶數"],
                'boy' => $load[$key]["男數"],
                'girl' => $load[$key]["女數"],
                'population' => $load[$key]["總人口數"],
                'born_population' => $load[$key]["出生人數"],
                'death_population' => $load[$key]["死亡人數"],
                'marriages' => $load[$key]["結婚對數"],
                'divorce' => $load[$key]["離婚對數"],
                'move_in' => $load[$key]["遷入人數"],
                'move_out' => $load[$key]["遷出人數"],
            ]);
        };
    }
}

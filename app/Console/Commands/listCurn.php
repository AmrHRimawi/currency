<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;

class listCurn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listCurn';

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
        //
        $allData = json_decode(file_get_contents("https://free.currencyconverterapi.com/api/v6/currencies"),true);
        $allData = $allData["results"];
        //dd($allData);
        foreach ($allData as $crn){
            try {
                $temp = new Currency();
                $temp->name = $crn["currencyName"];
                var_dump($temp->name);
                $temp->symbol = $crn["currencySymbol"];
                $temp->code = $crn["id"];
                $temp->save();
            }catch (\Exception $e){
                var_dump( 'error');
            }

        }




    }
}

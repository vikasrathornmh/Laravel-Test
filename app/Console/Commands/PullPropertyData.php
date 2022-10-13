<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\{Property, PropertyType};

class PullPropertyData extends Command
{
    public $total_pages = 0;
    public $current_page = 0;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:property';

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
     * @return int
     */
    public function handle()
    {
        $payload = ['api_key' => '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug'];
        echo "Pull data from api Job Start \r\n";
        do {
            if($this->current_page){
                $payload['page[number]'] = $this->current_page + 1;
                $payload['page[size]'] = 100;
            }
            $response = Http::get('https://trial.craig.mtcserver15.com/api/properties?',$payload);
            
            if($data = json_decode($response->body())){
               $this->current_page = $data->current_page;
               $this->total_pages = $data->last_page;
               $this->bulkInsert(json_decode( json_encode($data->data), true));
               echo "Successfull insert data of  \r\n Total Record :- $data->total  \r\n Limit per page:- $data->per_page    \r\n Current Page $data->current_page   \r\n  \r\n";
            }
        }
        while ($this->current_page != $this->total_pages);
        echo "Job Complete!";

    }

    public function bulkInsert($data = [])
    {
        foreach($data as $k =>$v){
           PropertyType::syncProperty($v['property_type']);
           unset($data[$k]['property_type']);
        }

       return Property::upsert($data, ['uuid'], ['property_type_id', 'county', 'country', 'town', 'description', 'address', 'image_full', 'image_thumbnail', 'latitude', 'longitude', 'num_bedrooms', 'num_bathrooms', 'price', 'type', 'updated_at']);
    }
}

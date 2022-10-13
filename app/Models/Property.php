<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = ['uuid', 'county', 'country', 'town', 'description', 'url', 'address', 'image_full', 'image_thumbnail', 'latitude', 'longitude', 'num_bedrooms', 'num_bathrooms', 'price', 'property_type_id', 'type', 'updated_at'];

    public function pullDataFromApi()
    {
        $response = Http::get('https://trial.craig.mtcserver15.com/api/properties?', [
            'api_key' => '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug'
        ]);

        $properties = json_decode($response->body());

        foreach($properties as $prop){
                $property = new Self;
                $property->uuid = $prop->uuid;
                $property->answer_a = $prop->answers->answer_a;
                $property->answer_b = $prop->answers->answer_b;
                $property->answer_c = $prop->answers->answer_c;
                $property->answer_d = $prop->answers->answer_d;
                $property->save();
        }
        return "DONE";
    }


    public function PropertyType(){
        return $this->hasOne(PropertyType::class, 'id','property_type_id');
    }
}

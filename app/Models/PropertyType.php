<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'updated_at'];

    public function syncProperty($property){
        if(!$property){
            return false;
        }
        return Self::upsert($property, ['id'],['title', 'description', 'updated_at']);
    }
}

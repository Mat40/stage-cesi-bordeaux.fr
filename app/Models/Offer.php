<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offer';
    protected $fillable = [
        'name', 
        'city',
        'type',
        'release_date',
        'trust', 
        'skills', 
        'salary', 
        'number_of_places', 
    ];

    public function area_activity(){
        return $this->belongsToMany(area_activity::class, 'possesses', 'id_Area_activity', 'id')->distinct();;    
    }
}
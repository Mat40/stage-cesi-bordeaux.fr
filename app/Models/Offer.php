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
        'mail',
        'release_date',
        'trust',
        'skills',
        'salary',
        'number_of_places',
    ];

    public function area_activity(){
        return $this->belongsToMany(area_activity::class, 'possesses', 'id_Area_activity', 'id')->distinct();;
    }

    public function appliedOffer()
    {
        return $this->hasMany(applied_job::class);
    }

    public function followedOffer()
    {
        return $this->hasMany(follow::class);
    }

    public function company(){
        return $this->belongsTo(Company::class, 'id_Company');
    }

    public function address(){
        return $this->belongsTo(Address::class, 'id_Address');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offer';

    public function company(){
        return $this->belongsTo(Company::class,'id_Company');
    }

    public function address(){
        return $this->belongsTo(Address::class,'id_Address');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\area_activity;


class possess extends Model
{   

    protected $table = 'possesses';
    protected $fillable = ['id', 'id_Area_activity'];
    use HasFactory;

    public function area_activity()
    {
        return $this->hasMany(possess::class, 'id', 'id_Area_activity');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }


}

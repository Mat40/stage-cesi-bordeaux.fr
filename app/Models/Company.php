<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\area_activity;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = [
        'name',
        'number_of_trainees',
        'trust',
        'description'
    ];

    public function locatedAt()
    {
        return $this->hasMany(Located_at::class);
    }

    public function area_activity()
    {
        return $this->belongsToMany(area_activity::class, 'part_of', 'id_Company', 'id');
    }
}

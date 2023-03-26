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

    public function partOf()
    {
        return $this->hasMany(part_of::class);
    }

}

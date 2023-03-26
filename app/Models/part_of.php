<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class part_of extends Model
{
    use HasFactory;
    protected $table = 'part_of';

    protected $fillable = ['company_id', 'area_id'];

    public function area_activity()
    {
        return $this->belongsTo(area_activity::class, 'area_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}

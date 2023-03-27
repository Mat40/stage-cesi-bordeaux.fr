<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area_activity extends Model
{
    use HasFactory;
    protected $table = 'area_activity';
    protected $fillable = [
        'name',
    ];


    public function partOf()
    {
        return $this->hasMany(part_of::class);
    }
}

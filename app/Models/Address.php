<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'city',
        'postal_code',
    ];


    public function locatedAt()
    {
        return $this->hasMany(Located_at::class);
    }
}

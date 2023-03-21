<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';

    public function address()
    {
        return $this->belongsToMany(Address::class, 'located_at', 'id_Company', 'id')->distinct();;
    }
}

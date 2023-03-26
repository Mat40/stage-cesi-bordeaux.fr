<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Located_at extends Model
{
    use HasFactory;
    protected $table = 'located_at';
    protected $fillable = ['company_id', 'address_id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

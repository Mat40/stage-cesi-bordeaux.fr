<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $table = 'cv';

    protected $fillable = [
        'file_name',
        'file_path',
        'id_User',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_User');
    }
}
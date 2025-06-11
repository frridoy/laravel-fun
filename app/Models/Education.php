<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $primaryKey = 'education_id';
    protected $fillable = [
        'user_id',
        'education_details',
    ];

    protected $casts = [
        'education_details' => 'array',
    ];
}

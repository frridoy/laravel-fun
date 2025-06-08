<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    protected $table = 'user_profiles';

    protected $primaryKey = 'id';

    protected $casts = [
        'address' => 'array',
    ];
}

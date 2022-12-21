<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_name',
        'experience_position',
        'experience_company',
        'user_id'
    ];

    // Table Experience is Child and have assosiation with Parent Table Users with foregin key experiences.user_id to primary key users.id
    public function user() {
        return $this->belongTo(User::class, 'user_id', 'id');
    }
}

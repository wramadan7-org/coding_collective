<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['education_name', 'user_id'];

    // Table Educations is Child and have assosiation with Parent Table Users with foregin key educations.user_id to primary key users.id
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['skill_name', 'user_id'];

    // Table Skills is Child and have assosiation with Parent Table Users with foregin key skill.user_id to primary key users.id
    public function user() {
        return $this->belongTo(User::class, 'user_id', 'id');
    }
}

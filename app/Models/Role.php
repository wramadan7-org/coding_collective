<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Mass Assigment
     * Set what the field we can manipulation the data
     */
    protected $fillable = ['role_name'];

    public function user() {
        return $this->hasMany(User::class);
    }
}

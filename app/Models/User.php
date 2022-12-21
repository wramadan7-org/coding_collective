<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * Mass Assigment
     * Set what the field we can manipulation the data
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_phone',
        'user_birthday',
        'user_last_position',
        'user_applied_position',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    public function getAuthPassword() {
        return $this->user_password;
    }

    // Table Users is Child and have assosiation with Parent Table Roles with foregin key users.role_id to primary key roles.id
    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    // Table Users is Parent and Owned assosiation with Child Table Educations with primary key users.id to foregin key educations.user_id
    public function education() {
        return $this->hasOne(Education::class);
    }

    // Table Users is Parent and Owned assosiation with Child Table Experience with primary key users.id to foregin key experience.user_id
    public function experience() {
        return $this->hasOne(Experience::class);
    }

    // Table Users is Parent and Owned assosiation with Child Table Skills with primary key users.id to foregin key skills.user_id
    public function skill() {
        return $this->hasMany(Skill::class);
    }
}

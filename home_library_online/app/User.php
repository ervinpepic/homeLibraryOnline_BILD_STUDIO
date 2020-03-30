<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    public function assignRole($role) {
        if(is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        return $this->roles()->sync($role, true);
    }

    public function get_roles(){
        return $this->roles->map(function($user) {return $user->name;});
    }

    public function books() {
        return $this->belongsToMany(Book::class, 'book_user')->withTimestamps();
    }
}

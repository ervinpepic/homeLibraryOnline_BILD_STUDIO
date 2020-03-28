<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    //
    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function orderBook($user) {
        $this->users()->sync($user, false);
    }
}

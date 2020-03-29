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

    public function scopeSearch($query, $search_query) {
        return $query->where('title', 'like', '%' .$search_query. '%')
            ->orWhere('author_name', 'like', '%' .$search_query. '%')
                ->orWhere('status', 'like', '%' .$search_query. '%');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_name', 'category', 'publisher', 'status'];
    //
    //get all users from the database that have relation to this model
    public function users() {
        return $this->belongsToMany(User::class, 'book_user')->withTimestamps();
    }
    //associate user with particular book.
    public function orderBook($user) {
        return $this->users()->sync($user,false);
    }

    //search function that allow searching by Title, Name and status of book.
    //we call this function in book list and in admin
    public function scopeSearch($query, $search_query) {
        return $query->where('title', 'like', '%' .$search_query. '%')
            ->orWhere('author_name', 'like', '%' .$search_query. '%')
                ->orWhere('status', 'like', '%' .$search_query. '%');
    }
}

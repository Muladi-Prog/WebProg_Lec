<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(replies::class);
    }

    public function likes() {
        return $this->hasMany(likes::class);
    }

    public function courses() {
        return $this->belongsTo(courses::class);
    }

    public function reads() {
        return $this->hasMany(reads::class);
    }

    public function bookmarks() {
        return $this->hasMany(bookmarks::class);
    }

    protected $fillable = [
        'courses_id',
        'users_id',
        'title',
        'description'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replies extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->belongsTo(posts::class);
    }

    protected $fillable = [
        'posts_id',
        'users_id',
        'title',
        'description',
    ];
}

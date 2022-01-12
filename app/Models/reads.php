<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reads extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->belongsTo(posts::class);
    }

    protected $fillable = [
        'users_id',
        'posts_id'
    ];
}

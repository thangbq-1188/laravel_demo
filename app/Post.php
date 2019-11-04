<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'category_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeByUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }
}

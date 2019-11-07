<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'category_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeByUser($query, $userId) {
        return $query->where('user_id', $userId);
    }

    public function scopeByCategory($query, $categoryId) {
        return $query->where('category_id', $categoryId);
    }
}

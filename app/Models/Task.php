<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'deadline' => 'datetime'
    ];

    protected $fillable = [
        "title",
        "tag",
        "description",
        "is_published",
        "is_completed",
        "author_id",
        "deadline"
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'task_id', 'id')->get();
    }
}

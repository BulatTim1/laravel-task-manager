<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "text",
        "task_id",
        "author_id"
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function task(){
        return $this->hasOne(Task::class, 'id', 'task_id')->first();
    }
}

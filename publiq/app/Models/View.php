<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'story_id',
    ];

    public function stories() {
        return $this->belongsTo(Story::class);
    }
    public function users() {
        return $this->belongsTo(User::class);
    }
}

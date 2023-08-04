<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificates extends Model
{
    use HasFactory;
    public $timestamps = true;


    protected $fillable = [
        'user_id',
        'lesson_id',
    ];
    // public function lesson()
    // {
    //     return $this->belongsTo(lessons::class, 'id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class,'id');
    // }
}



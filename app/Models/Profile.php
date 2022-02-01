<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'portrait_src',
        'url',
        'user_name',
        'title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

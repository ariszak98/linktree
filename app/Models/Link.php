<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;


    protected $fillable = [
        'url', 'description', 'user_id', 'is_active',
        'social'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

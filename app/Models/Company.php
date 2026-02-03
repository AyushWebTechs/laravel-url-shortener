<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * One company has many users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * One company has many short URLs
     */
    public function shortUrls()
    {
        return $this->hasMany(ShortUrl::class);
    }
}

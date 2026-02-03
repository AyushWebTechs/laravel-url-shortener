<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'original_url',
        'company_id',
        'created_by',
    ];

    /**
     * Short URL belongs to a company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Short URL belongs to a creator (user)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

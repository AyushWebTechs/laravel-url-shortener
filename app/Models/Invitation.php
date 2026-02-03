<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'company_id',
        'role_id',
        'invited_by',
    ];

    /**
     * Invitation belongs to a company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Invitation assigns a role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Invitation sent by a user
     */
    public function inviter()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}

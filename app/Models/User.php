<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * User belongs to a company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * User can have multiple roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * User creates many short URLs
     */
    public function shortUrls()
    {
        return $this->hasMany(ShortUrl::class, 'created_by');
    }

    /**
     * Invitations sent by this user
     */
    public function sentInvitations()
    {
        return $this->hasMany(Invitation::class, 'invited_by');
    }

    /**
     * Helper method to check role
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }
}

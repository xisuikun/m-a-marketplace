<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_verified',
        'passport_id',
        'face_verified_at',
        'linkedin_url',
        'country',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Check if user is an admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check if user is a seller
    public function isSeller(): bool
    {
        return $this->role === 'seller';
    }

    // Check if user is a buyer
    public function isBuyer(): bool
    {
        return $this->role === 'buyer';
    }

    // Companies owned by this user (if seller)
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    // NDAs signed by this user (if buyer)
    public function ndas(): HasMany
    {
        return $this->hasMany(Nda::class);
    }

    // KYC Requests
    public function kycRequests(): HasMany
    {
        return $this->hasMany(KycRequest::class);
    }

    // Bookmarked Deals
    public function bookmarkedDeals()
    {
        return $this->belongsToMany(Deal::class, 'deal_user_bookmarks')->withTimestamps();
    }

    // Offers made by this user (if buyer)
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    // Messages sent
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Messages received
    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}

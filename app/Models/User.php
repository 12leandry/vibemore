<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "uuid",
        'name',
        'email',
        'mobile_verification_code',
        'email_verified_at',
        "description",
        "thumbnial",
        "profile",
        "gender",
        "relationship",
        "location",
        "address",
        "is_private",
        "is_banned",
        'password',
    ];


    public static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->uuid = Str::uuid();
    });
}
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function is_friend()
    {
              // dd(Friend::where(["user_id" => $this->id])->orWhere("friend_id", $this->id));
              $friend = Friend::where(["user_id" => $this->id])->orWhere("friend_id", $this->id)->first();
        // dd($friend);
        return $friend ? $friend->status : "";
    }
    /**
     * Get all of the posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

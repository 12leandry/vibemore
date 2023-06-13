<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        "uuid",
        "user_id",
        "icon",
        "thumbnail",
        "description",
        "name",
        "location",
        "type",
        "members",
        "is_private",
    ];

    /**
     * Get the user that owns the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->uuid = Str::uuid();
    });
}
    /**
     * Get all of the post for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}

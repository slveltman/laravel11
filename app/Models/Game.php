<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    public function reviews(): HasMany
    {
        return $this->hasMany(review::class);
    }
    // In your Game.php model
    protected $fillable = ['gameName', 'price', 'description', 'rating', 'is_active'];

    // Relatie met de User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

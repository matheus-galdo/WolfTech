<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Cart extends Model
{
    use HasFactory;
    public $timestamps  = false;

    public $fillable = ['user_id'];

    public $table = 'cart';

    protected function userId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Uuid::fromString($value),
        );
    }
    
    function items(): HasMany
    {
        return $this->hasMany(CartProduct::class)->with(['product']);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['ammount', 'id']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

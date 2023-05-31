<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class CartProduct extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $fillable = ['ammount', 'cart_id', 'product_id'];

    public $table = 'cart_product';

    protected function productId(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Uuid::fromString($value),
        );
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}
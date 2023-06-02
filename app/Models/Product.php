<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    public $timestamps  = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'name', 'description', 'price', 'imageUrl'
    ];

    protected $casts = [
        'price' => 'float',
    ];

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Uuid::fromString($value),
        );
    }
    
    public function cart(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }
}

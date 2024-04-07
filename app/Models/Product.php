<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'brand_id',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function skus(): HasMany
    {
        return $this->hasMany(related: Sku::class, foreignKey: 'product_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(related: Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }
}

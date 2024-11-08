<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'tax',
        'group_id'
    ];

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class);
    }

    public function tables(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'tables_products')
                    ->withPivot('quantity','price')
                    ->withTimestamps();
    }
}

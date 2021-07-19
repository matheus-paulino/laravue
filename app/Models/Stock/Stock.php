<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

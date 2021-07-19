<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock\Stock;


class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'status'
    ];

    public function stocks()
    {
        return $this->belongsToMany(Stock::class);
    }
    
}

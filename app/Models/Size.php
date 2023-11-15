<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'Size_Description',
        'Size_ProdID',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'Prod_ID', 'Size_ID');
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

}

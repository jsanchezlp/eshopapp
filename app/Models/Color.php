<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'Color_Description',
    ];


    public function products(){
        return $this->belongsToMany(Product::class, 'products_has_colors', 'Colors_Color_ID', 'Products_Prod_ID', 'Color_ID', 'Prod_ID');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

}

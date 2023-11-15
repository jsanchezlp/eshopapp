<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'Brand_Name',
    ];

    // public function getRouteKeyName(){
    //     return 'Brand_ID';
    // }

    //Relación con categorías
    public function categories(){
        // return $this->belongsToMany(Category::class, 'brands_has_categories', 'Brands_Brand_ID', 'Categories_Cate_ID', 'Brand_ID', 'Cate_ID');
        return $this->belongsToMany(Category::class, 'brands_has_categories', 'Brands_Brand_ID', 'Categories_Cate_ID');
    }

    //Relación con productos
    public function products(){
        return $this->hasMany(Product::class, 'Prod_BrandID', 'Brand_ID');
    }


}

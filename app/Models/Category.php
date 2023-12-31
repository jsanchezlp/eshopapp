<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    protected $primaryKey = 'Cate_ID';

    protected $fillable = [
        'Cate_Name',
        'Cate_Slug',
        'Cate_Family_ID',
    ];

    // public function getRouteKeyName(){
    //     return 'Cate_ID';
    // }

    Public function family(){
        return $this->belongsTo(Family::class, 'Cate_Family_ID', 'Family_ID');
    }

    //Relación uno a muchos con subcategorías
    public function subcategories(){
        return $this->hasMany(Subcategory::class, 'Subcat_CatID', 'Cate_ID');
    }

    //Relación muchos a muchos con marcas
    public function brands(){
        return $this->belongsToMany(Brand::class, 'brands_has_categories', 'Categories_Cate_ID', 'Brands_Brand_ID', 'Cate_ID', 'Brand_ID');
    }

    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    public function categoryImages(){
        return $this->hasMany(Image::class, 'Img_EntityID', 'Cate_ID')->where('Img_EntityTypeID', 2);
    }

}

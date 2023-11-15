<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */

     protected $table = 'Subcategories';


    //  protected $fillable = [
    //      'Subcat_Name',
    //      'Subcat_Slug'
    //  ];

    // la propiedad $guarded define los campos que queremos deshabilitar por asigación masiva
    protected $guarded = [
        'Subcat_ID',
    ];


    Public function category(){
        return $this->belongsTo(Category::class, 'Subcat_CatID', 'Cate_ID');
    }

    //Relación uno a muchos con productos
    public function products(){
        return $this->hasMany(Product::class, 'Subcat_ID', 'Prod_SubcatID');
    }

    public function subcategoryImages(){
        return $this->hasMany(Image::class, 'Img_EntityID', 'Subcat_ID')->where('Img_EntityTypeID', 3);
    }

}

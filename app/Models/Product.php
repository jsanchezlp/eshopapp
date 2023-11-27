<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'Prod_ID';


    
    protected $guarded = [
        'Prod_ID',
    ];


    public function brand(){
        return $this->belongsTo(Brand::class, 'Prod_BrandID', 'Prod_ID');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'Prod_SuppID', 'Supp_ID');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'Prod_SubcatID', 'Subcat_ID');
    }

    public function variants(){
        return $this->hasMany(Variant::class, 'Variant_ProdID', 'Prod_ID');
    }

    public function options(){
        return $this->belongsToMany(Option::class, 'options_products', 'Opt_Prod_ProdID', 'Opt_Prod_OptionID', 'Prod_ID', 'Option_ID')
                    ->withPivot('Opt_Prod_Value');
    }

    public function colors(){
        return $this->belongsToMany(Color::class, 'products_has_colors', 'Products_Prod_ID', 'Colors_Color_ID', 'Prod_ID', 'Color_ID');
    }

    public function sizes(){
        return $this->hasMany(Size::class, 'Size_ProdID', 'Prod_ID');
    }

    public function productImages(){
        return $this->hasMany(Image::class, 'Img_EntityID', 'Prod_ID')->where('Img_EntityTypeID', 1);
    }

}

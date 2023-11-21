<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'Variant_Sku',
        'Variant_ProdID',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'Variant_ProdID', 'Prod_ID');
    }

    public function features(){
        return $this->belongsToMany(Feature::class, 'features_variants', 'Feature_Var_VatiantID', 'Feature_Var_FeatureID', 'Variant_ID', 'Feature_ID');
    }

}

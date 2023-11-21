<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'Feature_Value',
        'Feature_Description',
        'Feature_OptionID',
    ];

    public function option(){
        return $this->belongsTo(Option::class, 'Option_ID', 'Feature_ID');
    }

    public function variants(){
        return $this->belongsToMany(Variant::class, 'features_variants', 'Feature_Var_VatiantID', 'Feature_Var_FeatureID', 'Variant_ID', 'Feature_ID');
    }

}

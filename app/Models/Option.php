<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'Option_Name',
        'Option_Type',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'options_products', 'Opt_Prod_ProdID', 'Opt_Prod_OptionID', 'Prod_ID', 'Option_ID')
                    ->withPivot('Opt_Prod_Value');
    }

    public function features(){
        return $this->hasMany(Feature::class, 'Feature_OptionID', 'Option_ID');
    }

}

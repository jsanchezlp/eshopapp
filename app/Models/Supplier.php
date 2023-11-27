<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $primaryKey = 'Supp_ID';
    

    //Relación con productos
    public function products(){
        return $this->hasMany(Product::class, 'Supp_ID', 'Prod_SuppID');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';


    protected $fillable = [
        'Family_Name',
    ];

    
    //Relación uno a muchos con categorías
    public function categories() {
        return $this->hasMany(Category::class, 'Cate_FamilyID', 'Family_ID');
    }


}


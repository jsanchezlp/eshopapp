<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';

    protected $primaryKey = 'Family_ID';

    protected $fillable = [
        'Family_Name',
    ];

    
    //Relación uno a muchos con categorías
    public function categories() {
        return $this->hasMany(Category::class, 'Cate_Family_ID', 'Family_ID');
    }


}


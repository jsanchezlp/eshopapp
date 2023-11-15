<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    use HasFactory;

    protected $fillable = [
        'Img_EntityID',
        'Img_EntityTypeID',
        // 'Img_Path'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'Img_EntityID', 'Prod_ID');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'Img_EntityID', 'Cate_ID');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'Img_EntityID', 'Subcat_ID');
    }

}

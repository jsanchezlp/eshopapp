<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{

    protected $table = 'entitytype';

    use HasFactory;

    protected $fillable = [
        'EntityT_Name'
    ];

}

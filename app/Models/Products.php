<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'products';

    protected $fillable = ['product_name', 'quantity', 'price'];


    public function setProductNameAttribute($value)
    {
        $this->attributes['product_name'] = ucwords($value);
    }
}

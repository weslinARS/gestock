<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        "name",
        "description",
        "purchase_price",
        "sale_price",
        "stock",
        "stock_policy",
        "is_under_policy",
    ];

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,"supplier_id","id");
    }
}
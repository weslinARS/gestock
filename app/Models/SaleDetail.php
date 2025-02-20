<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    protected $fillable =[
        "amount", 
        "unit_price",
    ];

    public function sale(){
        return $this->belongsTo(Sale::class, "sale_id", "id");
    }
    
}
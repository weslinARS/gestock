<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierOrder extends Model
{
    //
    protected $fillable =[
        "status", 
        "order_date",
        "delivery_date",
    ];
    
    public function supplier(){
        return $this->belongsTo(Supplier::class,
        "supplier_id", "id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id", "id");
    }
    protected function casts(): array{
        return [
            "order_date" => "date",
            "delivery_date" => "date",
        ];
    }


}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = [
        "sale_date",
        "sale_amount_collected",
    ];

    protected function casts() : array {
        return [
            "sale_date" => "date",
        ];
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function salesDetails(){
        return $this->hasMany(SaleDetail::class, "sale_id", "id");
    }
}
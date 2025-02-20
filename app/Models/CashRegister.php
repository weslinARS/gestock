<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    //
    protected $fillable =[
        "starting_amount",
        "closing_amount",
        "opening_date",
        "closing_date",
        "total_sales_amount_collected",
    ];
    
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
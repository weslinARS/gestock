<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPhoneNumber extends Model
{
    //
    protected $fillable = [
        "phone_number",
        "contact_name",  
    ];


    public function supplier(){
        return $this->belongsTo(Supplier::class,"supplier_id","id");
    }

 
}
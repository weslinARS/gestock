<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable =[
        "name",
    ];
    public function SupplierPhoneNumbers(){
        return $this->hasMany(SupplierPhoneNumber::class,"supplier_id","id");
    }
    public function SupplierEmailAddresses(){
        return $this->hasMany(SupplierEmail::class,"supplier_id","id");
    }
}
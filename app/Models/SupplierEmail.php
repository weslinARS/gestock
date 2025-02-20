<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierEmail extends Model
{
    //
    protected $fillable = [
        "email",
        "contact_name",
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,"supplier_id",
        "id");
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        "name", 
        "last_name",
        "phone_number", 
        "date_of_birth",
        "email",
    ];
    protected $hidden = [
        
    ];

    protected function casts(): array{
        return[
            "date_of_birth" => "datetime",
        ];
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");;
    }
}
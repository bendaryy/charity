<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithDraw extends Model
{
    use HasFactory;
    public function userDetails(){
        return $this->belongsTo(Details::class,'details_id');
    }
    public function charity(){

        return $this->belongsTo(Branch::class,'charity_id');
    }
}

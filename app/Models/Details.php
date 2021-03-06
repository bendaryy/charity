<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    public function branch(){
        return $this->belongsTo(Branch::class,'charity_id');
    }
    public function withdraw(){
        return $this->hasMany(WithDraw::class);
    }
}

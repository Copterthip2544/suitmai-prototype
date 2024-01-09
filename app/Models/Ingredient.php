<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'amount', 'price'];

    public function getPhotoUrlAttribute()
    {
        return asset('storage/images/' . $this->attributes['photo']);
    }
}
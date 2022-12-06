<?php

namespace App\Models\Bares;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    //
    use HasFactory
    protected $fillable = ['titulo', 'contenido'];



    public function scopeFilter($query, $filter)
    {
        return $query->where('name', 'like', '%' . $filter . '%');
    }

}

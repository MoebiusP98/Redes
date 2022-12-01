<?php

namespace App\Models\Bares;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    //
    protected $table      = 'Bares';
    protected $primaryKey = 'uri_bar';
    protected $keyType    = 'string';
    protected $fillable   = ['name'];

    public $timestamps    = false;
    public $incrementing  = false;


    public function scopeFilter($query, $filter)
    {
        return $query->where('name', 'like', '%' . $filter . '%');
    }

}

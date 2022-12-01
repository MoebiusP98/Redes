<?php

namespace App\Models\Bares;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table      = 'Bares_Places';
    protected $keyType    = 'string';
    protected $fillable   = ['locations'];
    protected $fillable   = ['images'];
    protected $fillable   = ['comments'];

    public $timestamps    = false;
    public $incrementing  = false;
}

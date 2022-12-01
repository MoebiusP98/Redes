<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table        = 'User';
    protected $primaryKey   = 'uri_user';
    protected $keyType      = 'string';
    protected $hidden       = ['password'];
    protected $fillable     = ['name'];

    public $timestamps      = false;
    public $incrementing    = false;


    public function scopeFilter($query, $filter)
    {

        return $query->where('name', 'like', '%' . $filter . '%')
        ->orWhere('mail', 'like', '%' . $filter . '%');
        
    }

}

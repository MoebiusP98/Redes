<?php

namespace App\Classes\Users;

use Exception;
use stdClass;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Users\User as UserModel;


class User
{
    private UserModel $user_model;

    function __construct($args = null)
    {
        if (is_null($args))
        {
            return $this;
        }

        if ($args instanceof UserModel) 
        {
            $this->user_model = $args;
            return $this;
        }

        return $this->load($args);
    }

    public function load($needle)
    {
        try{
            $this->user_model = UserModel::where('name', $needle)
            ->orWhere('email', $needle)
            ->firstOrFail();
        } catch (ModelNotFoundException $e) 
        {
            throw new Exception('User not found');
        }
    }
}
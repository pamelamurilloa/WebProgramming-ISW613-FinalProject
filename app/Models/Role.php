<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'email',
        'cellphone',
        'fk_role_id'
    ];
}

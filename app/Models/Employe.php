<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class Employe extends Model implements Authenticatable
{
    use HasFactory,AuthenticatableTrait;

    protected $fillable = [
        'fullname',
        'registration_number',
        'depart',
        'hire_date',
        'address',
        'phone',
        'city',
        'password' , 
        'image' , 
        'email' , 
    ];
}

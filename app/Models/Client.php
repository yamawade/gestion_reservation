<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    protected $table = 'clients';
    
    protected $fillable = [
        'email_client', 
        'mot_de_passe_client'
    ];

}




<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    //
    protected $table = 'contactos';
    protected $fillable = ['nome', 'email', 'ntelemovel', 'ntelefone', 'idade', 'altura', 'genero'];
}

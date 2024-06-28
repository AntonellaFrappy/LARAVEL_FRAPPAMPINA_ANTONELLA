<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //con protected $fillable passiamo i campi al database per il salvataggio
    protected $fillable = ['title', 'category', 'description', 'body', 'visible'];
}

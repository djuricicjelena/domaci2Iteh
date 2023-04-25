<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vezba extends Model
{
    use HasFactory;

    protected $table = 'vezbe';

    protected $fillable = ['naziv_vezbe', 'opis', 'trener_id', 'tip_id'];
}

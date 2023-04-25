<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trener extends Model
{
    use HasFactory;

    protected $table = 'treneri';

    protected $fillable = ['ime', 'prezime', 'email'];
}

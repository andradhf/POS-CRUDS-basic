<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
    protected $table = 'kasir';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nabar',
        'price',
        'qty',
        'disc',
        'totbar'
    ];
}


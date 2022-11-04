<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    protected $table = 'qr';
    protected $fillable = [
        'id',
        'name',
        'linkedin',
        'gitHub'
    ];
    use HasFactory;


}

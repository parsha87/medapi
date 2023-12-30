<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medikitdata extends Model
{
    use HasFactory;

    protected $table = 'medikitdata'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'medikit_name',
        'medikit_description',
    ];
}

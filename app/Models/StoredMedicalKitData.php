<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredMedicalKitData extends Model
{
    use HasFactory;

    protected $table = 'storedmedicalkitdata'; // Specify the table name

    protected $fillable = [
        'phone_number',
        'medikit_name',
        
    ];
}

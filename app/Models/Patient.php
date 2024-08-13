<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'height',
        'weight',
        'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'height' => 'float',
        'weight' => 'float',
    ];

    // Puedes agregar relaciones aquí si es necesario
    // Por ejemplo:
    // public function appointments()
    // {
    //     return $this->hasMany(Appointment::class);
    // }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GestionAcces extends Model
{
    use HasFactory;

    protected $table = 'gestion_acces'; // Define the table name

    protected $fillable = [
        'staff_id', // Use staff_id as a foreign key
        'date_acces',
        'heure_acces',
        'lieu_acces',
        'type_acces',
    ];

    protected $casts = [
        'date_acces' => 'date',
        'heure_acces' => 'datetime:H:i:s', // Ensure the correct format for time
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}

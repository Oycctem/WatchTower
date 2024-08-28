<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GestionPresence extends Model
{
    use HasFactory;

    protected $table = 'gestion_presences'; // Define the table name

    protected $fillable = [
        'staff_id', // Update this to reflect the new foreign key
        'date_presence',
        'statut_presence',
    ];

    protected $casts = [
        'date_presence' => 'date',
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}

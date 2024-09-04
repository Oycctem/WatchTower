<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportIncident extends Model
{
    use HasFactory;


    protected $table = 'rapport_incidents'; 

    protected $fillable = [
        'date_incident',
        'heure_incident',
        'lieu_incident',
        'description_incident',
        'gravite_incident',
    ];

    protected $casts = [
        'date_incident' => 'date',
        'heure_incident' => 'datetime:H:i:s',
    ];

    public function scopeWithDeleted($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeOnlyTrashed($query)
    {
        return $query->whereNotNull('deleted_at');
    }
}

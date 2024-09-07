<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportIncident extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'rapport_incidents'; // Adjust if your table name is different

    // The attributes that are mass assignable.
    protected $fillable = [
        'date_incident',
        'heure_incident',
        'lieu_incident',
        'description_incident',
        'gravite_incident',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'date_incident' => 'date',
        'heure_incident' => 'datetime:H:i:s',
    ];

    // Custom scope to handle soft deletes manually
    public function scopeWithDeleted($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeOnlyTrashed($query)
    {
        return $query->whereNotNull('deleted_at');
    }
}

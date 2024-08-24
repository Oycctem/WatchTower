<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GestionPresence extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'gestion_presences'; // Adjust if your table name is different

    // The attributes that are mass assignable.
    protected $fillable = [
        'nom_agent',
        'date_presence',
        'statut_presence',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'date_presence' => 'date',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'created_at',
        'updated_at',
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

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}

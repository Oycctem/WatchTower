<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMateriel extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'gestion_materiels'; // Adjust if your table name is different

    // The attributes that are mass assignable.
    protected $fillable = [
        'id_equipement',
        'nom_equipement',
        'statut_equipement',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'created_at',
        'updated_at',
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

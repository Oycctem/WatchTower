<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GestionConge extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'gestion_conges'; // Adjust if your table name is different

    // The attributes that are mass assignable.
    protected $fillable = [
        'staff_id',
        'debut_conge',
        'fin_conge',
        'raison_conge',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'debut_conge' => 'date',
        'fin_conge' => 'date',
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

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}

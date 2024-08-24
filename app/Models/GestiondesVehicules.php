<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GestiondesVehicules extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model.
    protected $table = 'vehicles'; // Adjust if your table name is different

    // The attributes that are mass assignable.
    protected $fillable = [
        'model',
        'status',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'status' => 'string',
    ];

    // Define soft delete column
    protected $dates = ['deleted_at'];

    // Custom query scope to include only non-deleted records
    public function scopeWithDeleted($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Custom query scope to include only deleted records
    public function scopeOnlyTrashed($query)
    {
        return $query->whereNotNull('deleted_at');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function cities()
    {
        return $this->hasMany(Cities::class, 'region_id');
    }

    public function etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }
}

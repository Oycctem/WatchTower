<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $fillable = [
        'name',
        'address',
        'region_id',
        'city_id',
        'client_id',
    ];

    /**
     * Get the region that owns the etablissement.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get the city that owns the etablissement.
     */
    public function city()
    {
        return $this->belongsTo(Cities::class);
    }

    /**
     * Get the client that owns the etablissement.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class Staff extends Model implements FilamentUser
{
    use HasFactory, HasRoles;

    protected $table = 'staff';

    protected $fillable = [
        'first_name',
        'last_name',
        'cin',
        'passport',
        'position',
        'region_id',
        'status',
        'marital_status',
        'phone_number_one',
        'phone_number_two',
        'picture',
        'age',
        'sexe',
        'clothes_size',
        'boots_size',
        'badge_id',
        'driver_license',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'status' => 'string',
        'marital_status' => 'string',
        'sexe' => 'string',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.name'));
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // if ($panel->getId() === 'admin') {
        //     return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        // }

        return true;
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole('test');
    }

}

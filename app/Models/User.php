<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'rol',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'rol' => 'string', // Ensure rol is cast as string
    ];

    public function proyectosAsignados()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_aprendices')
                    ->withPivot('estado', 'fecha_asignacion')
                    ->withTimestamps();
    }

    public function semilleros()
    {
        return $this->belongsToMany(Semillero::class, 'aprendices_semilleros')
                    ->withTimestamps();
    }

    public function initials(): string
    {
        return collect(explode(' ', $this->name))
            ->take(2)
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->implode('');
    }
}
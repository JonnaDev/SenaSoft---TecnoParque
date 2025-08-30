<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'semillero_id',
        'responsable_id',
        'fase_actual',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function semillero()
    {
        return $this->belongsTo(Semillero::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function aprendices()
    {
        return $this->belongsToMany(User::class, 'proyecto_aprendices')
                    ->withPivot('estado', 'fecha_asignacion')
                    ->withTimestamps();
    }
}

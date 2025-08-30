<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProyectoAprendiz extends Model
{
    protected $table = 'proyecto_aprendices';
    
    protected $fillable = [
        'proyecto_id',
        'user_id',
        'estado',
        'fecha_asignacion'
    ];

    protected $casts = [
        'fecha_asignacion' => 'date'
    ];

    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

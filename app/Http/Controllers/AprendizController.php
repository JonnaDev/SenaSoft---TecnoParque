<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\ProyectoAprendiz;
use App\Models\User;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index()
    {
        // Only show projects assigned to the current user if they are an Aprendiz
        if (auth()->user()->rol !== 'Aprendiz') {
            abort(403, 'Acceso denegado');
        }

        $proyectosAsignados = auth()->user()->proyectosAsignados()
            ->with(['semillero', 'responsable'])
            ->get();

        return view('aprendiz.index', compact('proyectosAsignados'));
    }

    public function show(Proyecto $proyecto)
    {
        // Verify the user is assigned to this project
        if (!auth()->user()->proyectosAsignados->contains($proyecto->id)) {
            abort(403, 'No tienes acceso a este proyecto');
        }

        $proyecto->load(['semillero', 'responsable', 'aprendices']);
        
        return view('aprendiz.show', compact('proyecto'));
    }
}

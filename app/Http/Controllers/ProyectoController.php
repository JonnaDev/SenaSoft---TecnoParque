<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Semillero;
use App\Models\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::with(['semillero', 'responsable'])->get();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semilleros = Semillero::all();
        $users = User::all();
        return view('proyectos.create', compact('semilleros', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'semillero_id' => 'required|exists:semilleros,id',
            'responsable_id' => 'required|exists:users,id',
            'fase_actual' => 'required|in:propuesta,analisis,diseño,desarrollo,prueba,implantacion',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
        ]);

        $proyecto = Proyecto::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Proyecto creado exitosamente',
                'proyecto' => $proyecto->load(['semillero', 'responsable'])
            ]);
        }

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        $proyecto->load(['semillero', 'responsable']);
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'proyecto' => $proyecto
            ]);
        }
        
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $semilleros = Semillero::all();
        $users = User::all();
        return view('proyectos.edit', compact('proyecto', 'semilleros', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'semillero_id' => 'required|exists:semilleros,id',
            'responsable_id' => 'required|exists:users,id',
            'fase_actual' => 'required|in:propuesta,analisis,diseño,desarrollo,prueba,implantacion',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
        ]);

        $proyecto->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Proyecto actualizado exitosamente',
                'proyecto' => $proyecto->load(['semillero', 'responsable'])
            ]);
        }

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Proyecto eliminado exitosamente'
            ]);
        }

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente');
    }
}

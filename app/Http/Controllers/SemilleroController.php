<?php

namespace App\Http\Controllers;

use App\Models\Semillero;
use App\Models\User;
use Illuminate\Http\Request;

class SemilleroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semilleros = Semillero::with('responsable')->get();
        return view('semilleros.index', compact('semilleros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('semilleros.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'responsable_id' => 'nullable|exists:users,id',
        ]);

        $semillero = Semillero::create($validated);
        
        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semillero $semillero)
    {
        $semillero->load('responsable');
        
        if (request()->ajax()) {
            return response()->json([
                'semillero' => $semillero,
                'html' => view('semilleros.show', compact('semillero'))->render()
            ]);
        }
        
        return view('semilleros.show', compact('semillero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semillero $semillero)
    {
        $users = User::all();
        return view('semilleros.edit', compact('semillero', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semillero $semillero)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'responsable_id' => 'nullable|exists:users,id',
        ]);

        $semillero->update($validated);
        
        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semillero $semillero)
    {
        $semillero->delete();
        
        return redirect()->route('semilleros.index')
            ->with('success', 'Semillero eliminado exitosamente.');
    }
}


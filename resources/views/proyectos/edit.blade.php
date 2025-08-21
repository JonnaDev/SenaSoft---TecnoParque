<x-layouts.app title="Editar Proyecto">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800">
        <div class="px-4 py-8 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center space-x-4">
                        <flux:button 
                            href="{{ route('proyectos.index') }}" 
                            variant="ghost" 
                            icon="arrow-left"
                            class="text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">
                        </flux:button>
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Editar Proyecto</h1>
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                                Modifica la información del proyecto "{{ $proyecto->titulo }}"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white">Información del Proyecto</h3>
                    </div>
                    
                    <form action="{{ route('proyectos.update', $proyecto) }}" method="POST" class="p-6 space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <flux:field>
                                <flux:label>Título del Proyecto</flux:label>
                                <flux:input 
                                    name="titulo" 
                                    value="{{ old('titulo', $proyecto->titulo) }}" 
                                    placeholder="Ingresa el título del proyecto"
                                    class="w-full" />
                                <flux:error name="titulo" />
                            </flux:field>
                        </div>

                        <div>
                            <flux:field>
                                <flux:label>Descripción</flux:label>
                                <flux:textarea 
                                    name="descripcion" 
                                    placeholder="Describe el proyecto, sus objetivos y alcance"
                                    rows="4"
                                    class="w-full">{{ old('descripcion', $proyecto->descripcion) }}</flux:textarea>
                                <flux:error name="descripcion" />
                            </flux:field>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <flux:field>
                                    <flux:label>Semillero</flux:label>
                                    <flux:select name="semillero_id" class="w-full">
                                        <option value="">Selecciona un semillero</option>
                                        @foreach($semilleros as $semillero)
                                            <option value="{{ $semillero->id }}" {{ old('semillero_id', $proyecto->semillero_id) == $semillero->id ? 'selected' : '' }}>
                                                {{ $semillero->nombre }}
                                            </option>
                                        @endforeach
                                    </flux:select>
                                    <flux:error name="semillero_id" />
                                </flux:field>
                            </div>

                            <div>
                                <flux:field>
                                    <flux:label>Responsable</flux:label>
                                    <flux:select name="responsable_id" class="w-full">
                                        <option value="">Selecciona un responsable</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('responsable_id', $proyecto->responsable_id) == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} ({{ $user->rol }})
                                            </option>
                                        @endforeach
                                    </flux:select>
                                    <flux:error name="responsable_id" />
                                </flux:field>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <flux:field>
                                    <flux:label>Fase Actual</flux:label>
                                    <flux:select name="fase_actual" class="w-full">
                                        <option value="">Selecciona una fase</option>
                                        <option value="propuesta" {{ old('fase_actual', $proyecto->fase_actual) == 'propuesta' ? 'selected' : '' }}>Propuesta</option>
                                        <option value="analisis" {{ old('fase_actual', $proyecto->fase_actual) == 'analisis' ? 'selected' : '' }}>Análisis</option>
                                        <option value="diseño" {{ old('fase_actual', $proyecto->fase_actual) == 'diseño' ? 'selected' : '' }}>Diseño</option>
                                        <option value="desarrollo" {{ old('fase_actual', $proyecto->fase_actual) == 'desarrollo' ? 'selected' : '' }}>Desarrollo</option>
                                        <option value="prueba" {{ old('fase_actual', $proyecto->fase_actual) == 'prueba' ? 'selected' : '' }}>Prueba</option>
                                        <option value="implantacion" {{ old('fase_actual', $proyecto->fase_actual) == 'implantacion' ? 'selected' : '' }}>Implantación</option>
                                    </flux:select>
                                    <flux:error name="fase_actual" />
                                </flux:field>
                            </div>

                            <div>
                                <flux:field>
                                    <flux:label>Fecha de Inicio</flux:label>
                                    <flux:input 
                                        type="date"
                                        name="fecha_inicio" 
                                        value="{{ old('fecha_inicio', $proyecto->fecha_inicio?->format('Y-m-d')) }}" 
                                        class="w-full" />
                                    <flux:error name="fecha_inicio" />
                                </flux:field>
                            </div>

                            <div>
                                <flux:field>
                                    <flux:label>Fecha de Fin (Opcional)</flux:label>
                                    <flux:input 
                                        type="date"
                                        name="fecha_fin" 
                                        value="{{ old('fecha_fin', $proyecto->fecha_fin?->format('Y-m-d')) }}" 
                                        class="w-full" />
                                    <flux:error name="fecha_fin" />
                                </flux:field>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                            <flux:button 
                                href="{{ route('proyectos.index') }}" 
                                variant="ghost"
                                class="text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">
                                Cancelar
                            </flux:button>
                            <flux:button 
                                type="submit" 
                                variant="primary"
                                icon="check"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white">
                                Actualizar Proyecto
                            </flux:button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

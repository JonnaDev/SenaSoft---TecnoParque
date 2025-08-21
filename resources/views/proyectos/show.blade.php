<x-layouts.app title="Proyecto: {{ $proyecto->titulo }}">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800">
        <div class="px-4 py-8 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center space-x-4">
                        <flux:button 
                            href="{{ route('proyectos.index') }}" 
                            variant="ghost" 
                            icon="arrow-left"
                            class="text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">
                        </flux:button>
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $proyecto->titulo }}</h1>
                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                                Detalles completos del proyecto
                            </p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <flux:button 
                                href="{{ route('proyectos.edit', $proyecto) }}" 
                                variant="primary" 
                                icon="pencil"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white">
                                Editar
                            </flux:button>
                        </div>
                    </div>
                </div>

                <!-- Project Details -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Description Card -->
                        <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-4">
                                <h3 class="text-lg font-semibold text-white">Descripción del Proyecto</h3>
                            </div>
                            <div class="p-6">
                                <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-lg border border-emerald-200 dark:border-emerald-800 p-4">
                                    <p class="text-emerald-800 dark:text-emerald-200 leading-relaxed">
                                        {{ $proyecto->descripcion ?: 'No hay descripción disponible para este proyecto.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Project Info -->
                        <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Información</h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Fase Actual</label>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                        @if($proyecto->fase_actual === 'propuesta') bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                        @elseif($proyecto->fase_actual === 'analisis') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @elseif($proyecto->fase_actual === 'diseño') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                        @elseif($proyecto->fase_actual === 'desarrollo') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                        @elseif($proyecto->fase_actual === 'prueba') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                        @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                        <flux:icon name="flag" class="w-4 h-4 mr-1" />
                                        {{ ucfirst($proyecto->fase_actual) }}
                                    </span>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Semillero</label>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        <flux:icon name="academic-cap" class="w-4 h-4 mr-1" />
                                        {{ $proyecto->semillero->nombre ?? 'Sin asignar' }}
                                    </span>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Responsable</label>
                                    @if($proyecto->responsable)
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-slate-200 dark:bg-slate-600 flex items-center justify-center">
                                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300">
                                                    {{ substr($proyecto->responsable->name, 0, 2) }}
                                                </span>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">
                                                    {{ $proyecto->responsable->name }}
                                                </p>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium 
                                                    @if($proyecto->responsable->rol === 'Directora') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                                    @elseif($proyecto->responsable->rol === 'DirectorGrupo') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                    @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                                    {{ $proyecto->responsable->rol }}
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-sm text-slate-500 dark:text-slate-400">Sin responsable asignado</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Timestamps -->
                        <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Fechas del Proyecto</h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Fecha de Inicio</label>
                                    <p class="mt-1 text-sm text-slate-900 dark:text-white">
                                        {{ $proyecto->fecha_inicio->format('d/m/Y') }}
                                    </p>
                                </div>
                                @if($proyecto->fecha_fin)
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Fecha de Fin</label>
                                    <p class="mt-1 text-sm text-slate-900 dark:text-white">
                                        {{ $proyecto->fecha_fin->format('d/m/Y') }}
                                    </p>
                                </div>
                                @endif
                                <div class="pt-4 border-t border-slate-200 dark:border-slate-700">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Creado</label>
                                        <p class="mt-1 text-sm text-slate-900 dark:text-white">
                                            {{ $proyecto->created_at->format('d/m/Y H:i') }}
                                        </p>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">
                                            {{ $proyecto->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-slate-200 dark:border-slate-700">
                            <!-- Added action buttons like semilleros show view -->
                            <a href="{{ route('proyectos.edit', $proyecto) }}" 
                               class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>


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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

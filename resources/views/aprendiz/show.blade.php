<x-layouts.app title="Detalles del Proyecto">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800">
        <div class="p-6">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('aprendiz.index') }}" class="inline-flex items-center text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Volver a mis proyectos
                        </a>
                        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $proyecto->titulo }}</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-2">Detalles del proyecto asignado</p>
                    </div>
                    <span class="px-3 py-1 text-sm font-medium rounded-full
                        @if($proyecto->fase_actual === 'propuesta') bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-300
                        @elseif($proyecto->fase_actual === 'analisis') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300
                        @elseif($proyecto->fase_actual === 'diseño') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300
                        @elseif($proyecto->fase_actual === 'desarrollo') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                        @elseif($proyecto->fase_actual === 'prueba') bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300
                        @else bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                        @endif">
                        {{ ucfirst($proyecto->fase_actual) }}
                    </span>
                </div>
            </div>

            <!-- Project Details -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Description -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Descripción</h2>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">{{ $proyecto->descripcion }}</p>
                    </div>

                    <!-- Team Members -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">Equipo del Proyecto</h2>
                        <div class="space-y-3">
                            @foreach($proyecto->aprendices as $aprendiz)
                                <div class="flex items-center p-3 bg-slate-50 dark:bg-slate-700 rounded-lg">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                            {{ substr($aprendiz->name, 0, 2) }}
                                        </span>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-slate-900 dark:text-white">{{ $aprendiz->name }}</p>
                                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $aprendiz->email }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        @if($aprendiz->pivot->estado === 'activo') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                        @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                        @endif">
                                        {{ ucfirst($aprendiz->pivot->estado) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Project Info -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Información del Proyecto</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Semillero</label>
                                <p class="text-slate-900 dark:text-white">{{ $proyecto->semillero->nombre ?? 'Sin semillero' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Responsable</label>
                                <p class="text-slate-900 dark:text-white">{{ $proyecto->responsable->name ?? 'Sin responsable' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Fecha de Inicio</label>
                                <p class="text-slate-900 dark:text-white">{{ $proyecto->fecha_inicio->format('d/m/Y') }}</p>
                            </div>
                            @if($proyecto->fecha_fin)
                                <div>
                                    <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Fecha de Fin</label>
                                    <p class="text-slate-900 dark:text-white">{{ $proyecto->fecha_fin->format('d/m/Y') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Assignment Info -->
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Mi Asignación</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Fecha de Asignación</label>
                                <p class="text-slate-900 dark:text-white">{{ auth()->user()->proyectosAsignados->find($proyecto->id)->pivot->fecha_asignacion->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-slate-600 dark:text-slate-400">Estado</label>
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    @if(auth()->user()->proyectosAsignados->find($proyecto->id)->pivot->estado === 'activo') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                    @endif">
                                    {{ ucfirst(auth()->user()->proyectosAsignados->find($proyecto->id)->pivot->estado) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

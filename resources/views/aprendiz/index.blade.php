<x-layouts.app title="Mis Proyectos">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800">
        <div class="p-6">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Mis Proyectos</h1>
                        <p class="text-slate-600 dark:text-slate-400 mt-2">Proyectos asignados a tu perfil</p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Proyectos</p>
                            <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $proyectosAsignados->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Activos</p>
                            <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $proyectosAsignados->where('pivot.estado', 'activo')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">En Desarrollo</p>
                            <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $proyectosAsignados->where('fase_actual', 'desarrollo')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($proyectosAsignados as $proyecto)
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-lg font-semibold text-slate-900 dark:text-white line-clamp-2">
                                    {{ $proyecto->titulo }}
                                </h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full
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

                            <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">
                                {{ $proyecto->descripcion }}
                            </p>

                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    {{ $proyecto->semillero->nombre ?? 'Sin semillero' }}
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ $proyecto->responsable->name ?? 'Sin responsable' }}
                                </div>
                                <div class="flex items-center text-sm text-slate-600 dark:text-slate-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Asignado: {{ $proyecto->pivot->fecha_asignacion->format('d/m/Y') }}
                                </div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="px-2 py-1 text-xs font-medium rounded-full
                                    @if($proyecto->pivot->estado === 'activo') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                    @endif">
                                    {{ ucfirst($proyecto->pivot->estado) }}
                                </span>
                                <a href="{{ route('aprendiz.show', $proyecto->id) }}" 
                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                    Ver detalles
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-white">No hay proyectos asignados</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Aún no tienes proyectos asignados a tu perfil.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>

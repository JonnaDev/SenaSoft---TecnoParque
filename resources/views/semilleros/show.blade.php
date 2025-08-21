<x-layouts.app title="Editar Semillero">
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 px-6 py-4 border-b border-green-200 dark:border-green-700">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $semillero->nombre }}</h2>
                <!-- Updated to show responsable information with role badge -->
                @if($semillero->responsable)
                    <div class="flex items-center mt-2">
                        <div class="flex-shrink-0 h-6 w-6 mr-2">
                            <div class="h-6 w-6 rounded-full bg-green-200 dark:bg-green-700 flex items-center justify-center">
                                <span class="text-xs font-medium text-green-700 dark:text-green-300">
                                    {{ substr($semillero->responsable->name, 0, 1) }}
                                </span>
                            </div>
                        </div>
                        <p class="text-green-700 dark:text-green-300 text-sm">
                            Responsable: {{ $semillero->responsable->name }}
                        </p>
                        <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                            @if($semillero->responsable->rol === 'Directora') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400
                            @elseif($semillero->responsable->rol === 'DirectorGrupo') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                            @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400 @endif">
                            {{ $semillero->responsable->rol }}
                        </span>
                    </div>
                @else
                    <p class="text-green-700 dark:text-green-300 text-sm mt-2">Sin responsable asignado</p>
                @endif
            </div>
            <div class="flex items-center space-x-3">
                <!-- Simplified status badge since we don't have estado field -->
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                    <div class="w-2 h-2 rounded-full bg-green-400 mr-2"></div>
                    Activo
                </span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Description Section -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Descripción
            </h3>
            <div class="bg-green-50 dark:bg-green-900/10 rounded-lg p-4 border-l-4 border-green-400">
                <!-- Added fallback text for empty descriptions -->
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ $semillero->descripcion ?: 'No se ha proporcionado una descripción para este semillero.' }}
                </p>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Updated responsable info section -->
            @if($semillero->responsable)
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                <div class="flex items-center mb-3">
                    <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <h4 class="font-medium text-gray-900 dark:text-white">Responsable</h4>
                </div>
                <div class="space-y-2">
                    <p class="text-gray-700 dark:text-gray-300 font-medium">{{ $semillero->responsable->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $semillero->responsable->email }}</p>
                    <div class="flex items-center">
                        <span class="text-xs text-gray-500 dark:text-gray-400 mr-2">Rol:</span>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                            @if($semillero->responsable->rol === 'Directora') bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400
                            @elseif($semillero->responsable->rol === 'DirectorGrupo') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                            @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400 @endif">
                            {{ $semillero->responsable->rol }}
                        </span>
                    </div>
                </div>
            </div>
            @endif

            <!-- Added creation date info -->
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h4 class="font-medium text-gray-900 dark:text-white">Fecha de Creación</h4>
                </div>
                <p class="text-gray-700 dark:text-gray-300">{{ $semillero->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <!-- Added last update info -->
            @if($semillero->updated_at && $semillero->updated_at != $semillero->created_at)
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <h4 class="font-medium text-gray-900 dark:text-white">Última Actualización</h4>
                </div>
                <p class="text-gray-700 dark:text-gray-300">{{ $semillero->updated_at->format('d/m/Y H:i') }}</p>
            </div>
            @endif

            <!-- Added semillero ID info -->
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                    </svg>
                    <h4 class="font-medium text-gray-900 dark:text-white">ID del Semillero</h4>
                </div>
                <p class="text-gray-700 dark:text-gray-300 font-mono">#{{ $semillero->id }}</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('semilleros.edit', $semillero) }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Editar
            </a>
            <form action="{{ route('semilleros.destroy', $semillero) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este semillero?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Eliminar
                </button>

                <a href="{{ route('semilleros.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Volver
                </a>


            </form>
        </div>
    </div>
</div>
</x-layouts.app>

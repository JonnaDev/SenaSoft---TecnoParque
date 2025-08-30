<x-layouts.app title="Proyectos">
    <div class="px-4 py-8 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Proyectos</h1>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
                        Gestiona todos los proyectos de investigación
                    </p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <flux:button 
                        href="{{ route('proyectos.create') }}" 
                        variant="primary" 
                        icon="plus"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white">
                        Nuevo Proyecto
                    </flux:button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900 rounded-lg flex items-center justify-center">
                                <flux:icon name="folder" class="w-5 h-5 text-emerald-600 dark:text-emerald-400" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Proyectos</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $proyectos->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                <flux:icon name="users" class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Activos</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $proyectos->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-amber-100 dark:bg-amber-900 rounded-lg flex items-center justify-center">
                                <flux:icon name="clock" class="w-5 h-5 text-amber-600 dark:text-amber-400" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Este Mes</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $proyectos->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                                <flux:icon name="academic-cap" class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-slate-400">Semilleros</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-white">{{ $proyectos->pluck('semillero_id')->unique()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Table -->
        <div class="bg-white dark:bg-slate-800 shadow-sm rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Lista de Proyectos</h3>
            </div>
            
            @if($proyectos->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead class="bg-slate-50 dark:bg-slate-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Proyecto
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Fase
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Semillero
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Responsable
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Fecha Inicio
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($proyectos as $proyecto)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                                                    <flux:icon name="folder" class="h-5 w-5 text-white" />
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-slate-900 dark:text-white">
                                                    {{ $proyecto->titulo }}
                                                </div>
                                                <div class="text-sm text-slate-500 dark:text-slate-400 truncate max-w-xs">
                                                    {{ Str::limit($proyecto->descripcion, 255) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($proyecto->fase_actual === 'propuesta') bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200
                                            @elseif($proyecto->fase_actual === 'analisis') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                            @elseif($proyecto->fase_actual === 'diseño') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                            @elseif($proyecto->fase_actual === 'desarrollo') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                            @elseif($proyecto->fase_actual === 'prueba') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200
                                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                            {{ ucfirst($proyecto->fase_actual) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ $proyecto->semillero->nombre ?? 'Sin asignar' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <div class="h-8 w-8 rounded-full bg-slate-200 dark:bg-slate-600 flex items-center justify-center">
                                                    <span class="text-xs font-medium text-slate-700 dark:text-slate-300">
                                                        {{ substr($proyecto->responsable->name ?? 'N/A', 0, 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-slate-900 dark:text-white">
                                                    {{ $proyecto->responsable->name ?? 'Sin asignar' }}
                                                </div>
                                                @if($proyecto->responsable)
                                                    <div class="text-xs text-slate-500 dark:text-slate-400">
                                                        {{ $proyecto->responsable->rol }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                        {{ $proyecto->fecha_inicio->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-2">
                                            <flux:button 
                                                size="sm" 
                                                variant="ghost" 
                                                icon="eye"
                                                href="{{ route('proyectos.show', $proyecto) }}"
                                                class="text-slate-600 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400">
                                            </flux:button>
                                            <flux:button 
                                                size="sm" 
                                                variant="ghost" 
                                                icon="pencil"
                                                href="{{ route('proyectos.edit', $proyecto) }}"
                                                class="text-slate-600 hover:text-blue-600 dark:text-slate-400 dark:hover:text-blue-400">
                                            </flux:button>
                                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <flux:button 
                                                    size="sm" 
                                                    variant="ghost" 
                                                    icon="trash"
                                                    type="submit"
                                                    class="text-slate-600 hover:text-red-600 dark:text-slate-400 dark:hover:text-red-400">
                                                </flux:button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <flux:icon name="folder" class="mx-auto h-12 w-12 text-slate-400 dark:text-slate-500" />
                    <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-white">No hay proyectos</h3>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Comienza creando tu primer proyecto.</p>
                    <div class="mt-6">
                        <flux:button 
                            href="{{ route('proyectos.create') }}" 
                            variant="primary" 
                            icon="plus"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white">
                            Nuevo Proyecto
                        </flux:button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>


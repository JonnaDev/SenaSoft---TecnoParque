<x-layouts.app :title="__('Dashboard')">
    <!-- Applied dark blue gradient background and modern dashboard cards -->
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800">
        <div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
            <!-- Stats Cards -->
            <div class="grid auto-rows-min gap-6 md:grid-cols-3">
                <!-- Semilleros Card -->
                <div class="relative overflow-hidden rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 p-6 hover:bg-white/15 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-300">Total Semilleros</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Semillero::count() }}</p>
                        </div>
                        <div class="rounded-full bg-green-500/20 p-3">
                            <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Proyectos Card -->
                <div class="relative overflow-hidden rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 p-6 hover:bg-white/15 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-300">Total Proyectos</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Proyecto::count() }}</p>
                        </div>
                        <div class="rounded-full bg-blue-500/20 p-3">
                            <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Usuarios Card -->
                <div class="relative overflow-hidden rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 p-6 hover:bg-white/15 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-300">Total Usuarios</p>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\User::count() }}</p>
                        </div>
                        <div class="rounded-full bg-purple-500/20 p-3">
                            <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="relative h-full flex-1 overflow-hidden rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 p-6">
                <div class="h-full flex flex-col items-center justify-center text-center">
                    <div class="rounded-full bg-slate-700/50 p-4 mb-4">
                        <svg class="h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H9a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">Bienvenido a TecnoParque</h3>
                    <p class="text-slate-300 max-w-md">
                        Sistema de gestión y seguimiento de semilleros de investigación y sus proyectos.
                        Utiliza el menú lateral para navegar entre las diferentes secciones.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

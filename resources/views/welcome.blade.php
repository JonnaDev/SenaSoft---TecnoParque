<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecnoParque - Sistema de Gestión</title>
    @vite('resources/css/app.css')
</head>
<!-- Applied modern dark blue gradient theme throughout -->
<body class="antialiased bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white">

    <!-- HEADER -->
    <header class="bg-white/10 backdrop-blur-md border-b border-white/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                
                <!-- LOGO -->
                <div class="text-2xl font-bold text-white flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">T</span>
                    </div>
                    TecnoParque
                </div>

                <!-- NAV LINKS -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#inicio" class="text-slate-200 hover:text-green-400 transition-colors">Inicio</a>
                    <a href="#nosotros" class="text-slate-200 hover:text-green-400 transition-colors">Sobre Nosotros</a>
                    <a href="#personal" class="text-slate-200 hover:text-green-400 transition-colors">Nuestro Personal</a>
                </nav>

                <!-- LOGIN / REGISTER -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-lg hover:from-green-600 hover:to-blue-600 transition-all transform hover:scale-105">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 border border-white/30 rounded-lg hover:bg-white/10 transition-all">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition-all">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- MOBILE MENU BUTTON -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-white focus:outline-none p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/10 backdrop-blur-md border-t border-white/20">
            <nav class="flex flex-col space-y-2 px-4 py-3">
                <a href="#inicio" class="text-slate-200 hover:text-green-400 py-2">Inicio</a>
                <a href="#nosotros" class="text-slate-200 hover:text-green-400 py-2">Sobre Nosotros</a>
                <a href="#personal" class="text-slate-200 hover:text-green-400 py-2">Nuestro Personal</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-lg text-center mt-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 border border-white/30 rounded-lg text-center mt-2">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-white/20 rounded-lg text-center">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- SECTIONS -->
    <main>
        <!-- Inicio -->
        <section id="inicio" class="min-h-screen flex flex-col justify-center items-center p-8 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-blue-500/20"></div>
            </div>
            
            <div class="relative z-10 text-center max-w-4xl">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">
                    Sistema de Gestión y Seguimiento
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-slate-300 leading-relaxed">
                    Plataforma integral para la gestión de semilleros de investigación, proyectos y seguimiento de fases, 
                    garantizando la trazabilidad completa de cada proceso en TecnoParque.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-xl hover:from-green-600 hover:to-blue-600 transition-all transform hover:scale-105 font-semibold">
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-xl hover:from-green-600 hover:to-blue-600 transition-all transform hover:scale-105 font-semibold">
                            Comenzar Ahora
                        </a>
                        <a href="#nosotros" class="px-8 py-4 border border-white/30 rounded-xl hover:bg-white/10 transition-all font-semibold">
                            Conocer Más
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Sobre Nosotros -->
        <section id="nosotros" class="min-h-screen flex flex-col justify-center items-center p-8 bg-white/5 backdrop-blur-sm">
            <div class="max-w-4xl text-center">
                <h2 class="text-4xl font-bold mb-8 text-white">Sobre Nosotros</h2>
                <p class="text-xl text-slate-300 leading-relaxed mb-8">
                    TecnoParque es una iniciativa dedicada al fomento de la investigación y la innovación tecnológica. 
                    Nuestra plataforma centraliza la gestión de semilleros de investigación, facilitando el seguimiento 
                    de proyectos desde su concepción hasta su implementación.
                </p>
                <div class="grid md:grid-cols-3 gap-8 mt-12">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-white">Innovación</h3>
                        <p class="text-slate-300">Fomentamos la creatividad y el desarrollo de soluciones tecnológicas avanzadas.</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-white">Calidad</h3>
                        <p class="text-slate-300">Garantizamos estándares de excelencia en todos nuestros procesos y proyectos.</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-white">Colaboración</h3>
                        <p class="text-slate-300">Promovemos el trabajo en equipo y la sinergia entre investigadores.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nuestro Personal -->
        <section id="personal" class="py-16 bg-white/5 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center mb-12 text-white">Nuestro Personal</h2>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Card 1 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-6 text-center transform transition duration-300 hover:scale-105 hover:bg-white/15">
                        <div class="w-32 h-32 mx-auto rounded-full mb-4 bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">MP</span>
                        </div>
                        <h3 class="text-xl font-semibold text-white">María Pérez</h3>
                        <p class="text-green-400 mb-4">Directora de Proyectos</p>
                        <p class="text-sm text-slate-300">Lidera la estrategia y coordinación de todos los proyectos con visión y compromiso.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-6 text-center transform transition duration-300 hover:scale-105 hover:bg-white/15">
                        <div class="w-32 h-32 mx-auto rounded-full mb-4 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">CG</span>
                        </div>
                        <h3 class="text-xl font-semibold text-white">Carlos Gómez</h3>
                        <p class="text-blue-400 mb-4">Desarrollador Senior</p>
                        <p class="text-sm text-slate-300">Especialista en soluciones digitales innovadoras y optimización de sistemas.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-6 text-center transform transition duration-300 hover:scale-105 hover:bg-white/15">
                        <div class="w-32 h-32 mx-auto rounded-full mb-4 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">LM</span>
                        </div>
                        <h3 class="text-xl font-semibold text-white">Laura Martínez</h3>
                        <p class="text-purple-400 mb-4">Diseñadora UX/UI</p>
                        <p class="text-sm text-slate-300">Encargada de crear experiencias digitales atractivas y funcionales.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-black/30 backdrop-blur-sm border-t border-white/20 text-center py-8">
        <div class="max-w-4xl mx-auto px-4">
            <p class="text-slate-300">&copy; {{ date('Y') }} TecnoParque - Sistema de Gestión de Semilleros. Todos los derechos reservados.</p>
            <p class="text-slate-400 text-sm mt-2">Innovando en la gestión de proyectos de investigación</p>
        </div>
    </footer>

    <!-- JS para mobile menu -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>


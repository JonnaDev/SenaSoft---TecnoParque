<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecnoParque - Sistema de Gestión</title>
    @vite('resources/css/app.css')
</head>
<!-- Updated color scheme to light green with zinc-gray -->
<body class="antialiased bg-gradient-to-br from-zinc-100 via-green-50 to-zinc-200 text-zinc-800">

    <!-- HEADER -->
    <!-- Updated header colors for light theme -->
    <header class="bg-white/80 backdrop-blur-md border-b border-zinc-200 sticky top-0 z-50 animate-slide-down">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                
                <!-- LOGO -->
                <div class="text-2xl font-bold text-zinc-800 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">T</span>
                    </div>
                    TecnoParque
                </div>

                <!-- NAV LINKS -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#inicio" class="text-zinc-600 hover:text-green-600 transition-colors">Inicio</a>
                    <a href="#nosotros" class="text-zinc-600 hover:text-green-600 transition-colors">Sobre Nosotros</a>
                    <a href="#personal" class="text-zinc-600 hover:text-green-600 transition-colors">Nuestro Personal</a>
                </nav>

                <!-- LOGIN / REGISTER -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all transform hover:scale-105">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-zinc-500 to-gray-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all transform hover:scale-105 ">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-zinc-200 rounded-lg hover:bg-zinc-300 transition-all text-zinc-700">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- MOBILE MENU BUTTON -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-zinc-800 focus:outline-none p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/90 backdrop-blur-md border-t border-zinc-200">
            <nav class="flex flex-col space-y-2 px-4 py-3">
                <a href="#inicio" class="text-zinc-600 hover:text-green-600 py-2">Inicio</a>
                <a href="#nosotros" class="text-zinc-600 hover:text-green-600 py-2">Sobre Nosotros</a>
                <a href="#personal" class="text-zinc-600 hover:text-green-600 py-2">Nuestro Personal</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg text-center mt-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 border border-zinc-300 rounded-lg text-center mt-2 text-zinc-700">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-zinc-200 rounded-lg text-center text-zinc-700">
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
        <!-- Added typewriter animation and updated colors -->
        <section id="inicio" class="min-h-screen flex flex-col justify-center items-center p-8 relative overflow-hidden animate-fade-in">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0 bg-gradient-to-r from-green-200/30 to-emerald-300/30"></div>
            </div>
            
            <div class="relative z-10 text-center max-w-4xl">
                <!-- Added animated typewriter text -->
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-green-600 to-emerald-700 bg-clip-text text-transparent">
                    <span id="typewriter-text">Sistema de Gestión y Seguimiento</span>
                    <span id="cursor" class="animate-pulse">|</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-zinc-600 leading-relaxed animate-slide-up">
                    Plataforma integral para la gestión de semilleros de investigación, proyectos y seguimiento de fases, 
                    garantizando la trazabilidad completa de cada proceso en TecnoParque.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up-delayed">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all transform hover:scale-105 font-semibold">
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all transform hover:scale-105 font-semibold">
                            Comenzar Ahora
                        </a>
                        <a href="#nosotros" class="px-8 py-4 border border-zinc-400 rounded-xl hover:bg-zinc-100 transition-all font-semibold text-zinc-700">
                            Conocer Más
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Sobre Nosotros -->
        <!-- Updated colors and added scroll animations -->
        <section id="nosotros" class="min-h-screen flex flex-col justify-center items-center p-8 bg-white/60 backdrop-blur-sm scroll-animate">
            <div class="max-w-4xl text-center">
                <h2 class="text-4xl font-bold mb-8 text-zinc-800">Sobre Nosotros</h2>
                <p class="text-xl text-zinc-600 leading-relaxed mb-8">
                    TecnoParque es una iniciativa dedicada al fomento de la investigación y la innovación tecnológica. 
                    Nuestra plataforma centraliza la gestión de semilleros de investigación, facilitando el seguimiento 
                    de proyectos desde su concepción hasta su implementación.
                </p>
                <div class="grid md:grid-cols-3 gap-8 mt-12">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-zinc-200 shadow-lg scroll-animate">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-zinc-800">Innovación</h3>
                        <p class="text-zinc-600">Fomentamos la creatividad y el desarrollo de soluciones tecnológicas avanzadas.</p>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-zinc-200 shadow-lg scroll-animate">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-zinc-800">Calidad</h3>
                        <p class="text-zinc-600">Garantizamos estándares de excelencia en todos nuestros procesos y proyectos.</p>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-zinc-200 shadow-lg scroll-animate">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-zinc-800">Colaboración</h3>
                        <p class="text-zinc-600">Promovemos el trabajo en equipo y la sinergia entre investigadores.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nuestro Personal -->
        <!-- Replaced with single personal card with tech stack icons -->
        <section id="personal" class="py-16 bg-zinc-50/80 backdrop-blur-sm scroll-animate">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center mb-12 text-zinc-800">Nuestro Personal</h2>

                <div class="flex justify-center">
                    <!-- Personal Card -->
                    <div class="bg-white/90 backdrop-blur-sm rounded-2xl border border-zinc-200 shadow-xl p-8 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl max-w-md w-full">
                        <div class="w-32 h-32 mx-auto rounded-full mb-6 bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                            <span class="text-3xl font-bold text-white">JS</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-zinc-800 mb-2">John Sebastian Lopez T.</h3>
                        <p class="text-green-600 mb-4 font-medium">Desarrollador de Software</p>
                        <p class="text-sm text-zinc-600 mb-6 leading-relaxed">
                            Especialista en desarrollo full-stack con experiencia en múltiples tecnologías y frameworks modernos. 
                            Apasionado por crear soluciones innovadoras y eficientes.
                        </p>
                        
                        <!-- Added Full Stack title and tech icons -->
                        <h4 class="text-lg font-semibold text-zinc-800 mb-4">Full Stack Developer</h4>
                        
                        <!-- Tech Stack Icons -->
                        <div class="flex flex-wrap justify-center gap-3 mb-4">
                            <!-- Frontend -->
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform hover:bg-sky-500/" title="React">
                                <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 10.11c1.03 0 1.87.84 1.87 1.89s-.84 1.89-1.87 1.89c-1.03 0-1.87-.84-1.87-1.89s.84-1.89 1.87-1.89M7.37 20c.63.38 2.01-.2 3.6-1.7-.52-.59-1.03-1.23-1.51-1.9a22.7 22.7 0 0 1-2.4-.36c-.51 2.14-.32 3.61.31 3.96m.71-5.74l-.29-.51c-.11.29-.22.58-.29.86.27.06.57.11.88.16l-.3-.51m6.54-.76l.81-1.5-.81-1.5c-.3-.53-.62-1-.91-1.47C13.17 9 12.6 9 12 9s-1.17 0-1.71.03c-.29.47-.61.94-.91 1.47L8.57 12l.81 1.5c.3.53.62 1 .91 1.47.54.03 1.11.03 1.71.03s1.17 0 1.71-.03c.29-.47.61-.94.91-1.47M12 6.78c-.19.22-.39.45-.59.72h1.18c-.2-.27-.4-.5-.59-.72m0 10.44c.19-.22.39-.45.59-.72h-1.18c.2.27.4.5.59.72M16.62 4c-.62-.38-2 .2-3.59 1.7.52.59 1.03 1.23 1.51 1.9.82.08 1.63.2 2.4.36.51-2.14.32-3.61-.32-3.96m-.7 5.74l.29.51c.11-.29.22-.58.29-.86-.27-.06-.57-.11-.88-.16l.3.51m1.45-7.05c1.47.84 1.63 3.05 1.01 5.63 2.54.75 4.37 1.99 4.37 3.68s-1.83 2.93-4.37 3.68c.62 2.58.46 4.79-1.01 5.63-1.46.84-3.45-.12-5.37-1.95-1.92 1.83-3.91 2.79-5.37 1.95-1.47-.84-1.63-3.05-1.01-5.63-2.54-.75-4.37-1.99-4.37-3.68s1.83-2.93 4.37-3.68c-.62-2.58-.46-4.79 1.01-5.63 1.46-.84 3.45.12 5.37 1.95 1.92-1.83 3.91-2.79 5.37-1.95z"/>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform" title="JavaScript">
                                <svg class="w-6 h-6 text-yellow-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 3h18v18H3V3zm16.525 13.707c-.131-.821-.666-1.511-2.252-2.155-.552-.259-1.165-.438-1.349-.854-.068-.248-.078-.382-.034-.529.113-.484.687-.629 1.137-.495.293.09.563.315.732.676.775-.507.775-.507 1.316-.844-.203-.314-.304-.451-.439-.586-.473-.528-1.103-.798-2.126-.77l-.528.067c-.507.124-.991.395-1.283.754-.855.968-.608 2.655.427 3.354 1.023.765 2.521.933 2.712 1.653.18.878-.652 1.159-1.475 1.058-.607-.136-.945-.439-1.316-1.002l-1.372.788c.157.359.337.517.607.832 1.305 1.316 4.568 1.249 5.153-.754.021-.067.18-.528.056-1.237l.034.049zm-6.737-5.434h-1.686c0 1.453-.007 2.898-.007 4.354 0 .924.047 1.772-.104 2.033-.247.517-.886.451-1.175.359-.297-.146-.448-.349-.623-.641-.047-.078-.082-.146-.095-.146l-1.368.844c.229.473.563.879.994 1.137.641.383 1.502.507 2.404.305.588-.17 1.095-.519 1.358-1.059.384-.697.302-1.553.299-2.509.008-1.541 0-3.083 0-4.635l.003-.042z"/>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform" title="TypeScript">
                                <svg class="w-6 h-6 text-blue-700" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M1.125 0C.502 0 0 .502 0 1.125v21.75C0 23.498.502 24 1.125 24h21.75c.623 0 1.125-.502 1.125-1.125V1.125C24 .502 23.498 0 22.875 0zm17.363 9.75c.612 0 1.154.037 1.627.111a6.38 6.38 0 0 1 1.306.34v2.458a3.95 3.95 0 0 0-.643-.361 5.093 5.093 0 0 0-.717-.26 5.453 5.453 0 0 0-1.426-.2c-.3 0-.573.028-.819.086a2.1 2.1 0 0 0-.623.242c-.17.104-.3.229-.393.374a.888.888 0 0 0-.14.49c0 .196.053.373.156.529.104.156.252.304.443.444s.423.276.696.41c.273.135.582.274.926.416.47.197.892.407 1.266.628.374.222.695.473.963.753.268.279.472.598.614.957.142.359.214.776.214 1.253 0 .657-.125 1.21-.373 1.656a3.033 3.033 0 0 1-1.012 1.085 4.38 4.38 0 0 1-1.487.596c-.566.12-1.163.18-1.79.18a9.916 9.916 0 0 1-1.84-.164 5.544 5.544 0 0 1-1.512-.493v-2.63a5.033 5.033 0 0 0 3.237 1.2c.333 0 .624-.03.872-.09.249-.06.456-.144.623-.25.166-.108.29-.234.373-.38a1.023 1.023 0 0 0-.074-1.089 2.12 2.12 0 0 0-.537-.5 5.597 5.597 0 0 0-.807-.444 27.72 27.72 0 0 0-1.007-.436c-.918-.383-1.602-.852-2.053-1.405-.45-.553-.676-1.222-.676-2.005 0-.614.123-1.141.369-1.582.246-.441.58-.804 1.004-1.089a4.494 4.494 0 0 1 1.47-.629 7.536 7.536 0 0 1 1.77-.201zm-15.113.188h9.563v2.166H9.506v9.646H6.789v-9.646H3.375z"/>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform" title="Node.js">
                                <svg class="w-6 h-6 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.998,24c-0.321,0-0.641-0.084-0.922-0.247l-2.936-1.737c-0.438-0.245-0.224-0.332-0.08-0.383 c0.585-0.203,0.703-0.25,1.328-0.604c0.065-0.037,0.151-0.023,0.218,0.017l2.256,1.339c0.082,0.045,0.197,0.045,0.272,0l8.795-5.076 c0.082-0.047,0.134-0.141,0.134-0.238V6.921c0-0.099-0.053-0.192-0.137-0.242l-8.791-5.072c-0.081-0.047-0.189-0.047-0.271,0 L3.075,6.68C2.990,6.729,2.936,6.825,2.936,6.921v10.15c0,0.097,0.054,0.189,0.139,0.235l2.409,1.392 c1.307,0.654,2.108-0.116,2.108-0.89V7.787c0-0.142,0.114-0.253,0.256-0.253h1.115c0.139,0,0.255,0.112,0.255,0.253v10.021 c0,1.745-0.95,2.745-2.604,2.745c-0.508,0-0.909,0-2.026-0.551L2.28,18.675c-0.57-0.329-0.922-0.945-0.922-1.604V6.921 c0-0.659,0.353-1.275,0.922-1.603l8.795-5.082c0.557-0.315,1.296-0.315,1.848,0l8.794,5.082c0.570,0.329,0.924,0.944,0.924,1.603 v10.15c0,0.659-0.354,1.273-0.924,1.604l-8.794,5.078C12.643,23.916,12.324,24,11.998,24z M19.099,13.993 c0-1.9-1.284-2.406-3.987-2.763c-2.731-0.361-3.009-0.548-3.009-1.187c0-0.528,0.235-1.233,2.258-1.233 c1.807,0,2.473,0.389,2.747,1.607c0.024,0.115,0.129,0.199,0.247,0.199h1.141c0.071,0,0.138-0.031,0.186-0.081 c0.048-0.054,0.074-0.123,0.067-0.196c-0.177-2.098-1.571-3.076-4.388-3.076c-2.508,0-4.004,1.058-4.004,2.833 c0,1.925,1.488,2.457,3.895,2.695c2.88,0.282,3.103,0.703,3.103,1.269c0,0.983-0.789,1.402-2.642,1.402 c-2.327,0-2.839-0.584-3.011-1.742c-0.02-0.124-0.126-0.215-0.253-0.215h-1.137c-0.141,0-0.254,0.112-0.254,0.253 c0,1.482,0.806,3.248,4.655,3.248C17.501,17.007,19.099,15.91,19.099,13.993z"/>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform" title="Laravel">
                                <svg class="w-6 h-6 text-red-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033.012.009.025.018.036.027.02.015.032.030.049.047.008.011.019.02.023.033.012.016.021.044.023.058.003.012.01.02.014.032.005.032.014.065.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.007-.013.015-.027.024-.04.008-.014.018-.027.029-.038l.035-.027c.013-.012.025-.023.041-.034H18.1l4.512-2.597a.375.375 0 01.375 0l4.513 2.597c.016.01.027.021.041.034.012.009.025.018.036.027.02.015.032.030.049.047.008.011.019.02.023.033.012.016.021.044.023.058.003.012.01.02.014.032.005.032.014.065.014.098zm-.74 5.032V6.179l-1.578.908-2.182 1.256v4.283zm-4.51 7.75v-4.287l-2.147 1.225-6.126 3.498v4.325zM1.093 3.624v14.588l8.273 4.761v-4.325l-4.322-2.445-.002-.003H5.04c-.014-.01-.025-.021-.04-.031-.011-.01-.024-.018-.035-.027l-.001-.002c-.013-.012-.021-.025-.031-.04-.01-.011-.021-.02-.028-.033-.002-.003-.006-.003-.009-.006-.007-.014-.01-.027-.013-.041-.007-.011-.017-.02-.021-.033v-.003c-.002-.008-.007-.014-.008-.022V3.624zm9.18-2.224L5.954 3.624l4.32 2.481 4.32-2.481zm.368 15.681l2.182-1.256V3.624l-1.578.908-2.182 1.256v12.201l1.578-.908zm9.187-12.201l-4.32 2.481 4.32 2.48 4.32-2.48zm-.36 2.32l-2.182-1.256-1.578-.908v4.283l2.182 1.256 1.578.908zm-8.64 9.654l5.514-3.148 2.756-1.572-4.32-2.481-2.182 1.256-4.32 2.481z"/>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform hover:bg-sky-400/20" title="PHP">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                <path fill="url(#a)" d="M0 64c0 18.593 28.654 33.667 64 33.667 35.346 0 64-15.074 64-33.667 0-18.593-28.655-33.667-64-33.667C28.654 30.333 0 45.407 0 64Z"/><path fill="#777bb3" d="M64 95.167c33.965 0 61.5-13.955 61.5-31.167 0-17.214-27.535-31.167-61.5-31.167S2.5 46.786 2.5 64c0 17.212 27.535 31.167 61.5 31.167Z"/>
                                    <path d="M34.772 67.864c2.793 0 4.877-.515 6.196-1.53 1.306-1.006 2.207-2.747 2.68-5.175.44-2.27.272-3.854-.5-4.71-.788-.874-2.493-1.317-5.067-1.317h-4.464l-2.473 12.732zM20.173 83.547a.694.694 0 0 1-.68-.828l6.557-33.738a.695.695 0 0 1 .68-.561h14.134c4.442 0 7.748 1.206 9.827 3.585 2.088 2.39 2.734 5.734 1.917 9.935-.333 1.711-.905 3.3-1.7 4.724a15.818 15.818 0 0 1-3.128 3.92c-1.531 1.432-3.264 2.472-5.147 3.083-1.852.604-4.232.91-7.07.91h-5.724l-1.634 8.408a.695.695 0 0 1-.682.562z"/><path fill="#fff" d="M34.19 55.826h3.891c3.107 0 4.186.682 4.553 1.089.607.674.723 2.097.331 4.112-.439 2.257-1.253 3.858-2.42 4.756-1.194.92-3.138 1.386-5.773 1.386h-2.786l2.205-11.342zm6.674-8.1H26.731a1.39 1.39 0 0 0-1.364 1.123L18.81 82.588a1.39 1.39 0 0 0 1.363 1.653h7.35a1.39 1.39 0 0 0 1.363-1.124l1.525-7.846h5.151c2.912 0 5.364-.318 7.287-.944 1.977-.642 3.796-1.731 5.406-3.237a16.522 16.522 0 0 0 3.259-4.087c.831-1.487 1.429-3.147 1.775-4.931.86-4.423.161-7.964-2.076-10.524-2.216-2.537-5.698-3.823-10.349-3.823zM30.301 68.557h4.471c2.963 0 5.17-.557 6.62-1.675 1.451-1.116 2.428-2.98 2.938-5.591.485-2.508.264-4.277-.665-5.308-.931-1.03-2.791-1.546-5.584-1.546h-5.036l-2.743 14.12m10.563-19.445c4.252 0 7.353 1.117 9.303 3.348 1.95 2.232 2.536 5.347 1.76 9.346-.322 1.648-.863 3.154-1.625 4.518-.764 1.366-1.76 2.614-2.991 3.747-1.468 1.373-3.097 2.352-4.892 2.935-1.794.584-4.08.875-6.857.875h-6.296l-1.743 8.97h-7.35l6.558-33.739h14.133"/><path d="M69.459 74.577a.694.694 0 0 1-.682-.827l2.9-14.928c.277-1.42.209-2.438-.19-2.87-.245-.263-.979-.704-3.15-.704h-5.256l-3.646 18.768a.695.695 0 0 1-.683.56h-7.29a.695.695 0 0 1-.683-.826l6.558-33.739a.695.695 0 0 1 .682-.561h7.29a.695.695 0 0 1 .683.826L64.41 48.42h5.653c4.307 0 7.227.758 8.928 2.321 1.733 1.593 2.275 4.14 1.608 7.573l-3.051 15.702a.695.695 0 0 1-.682.56h-7.407z"/><path fill="#fff" d="M65.31 38.755h-7.291a1.39 1.39 0 0 0-1.364 1.124l-6.557 33.738a1.39 1.39 0 0 0 1.363 1.654h7.291a1.39 1.39 0 0 0 1.364-1.124l3.537-18.205h4.682c2.168 0 2.624.463 2.641.484.132.14.305.795.019 2.264l-2.9 14.927a1.39 1.39 0 0 0 1.364 1.654h7.408a1.39 1.39 0 0 0 1.363-1.124l3.051-15.7c.715-3.686.103-6.45-1.82-8.217-1.836-1.686-4.91-2.505-9.398-2.505h-4.81l1.421-7.315a1.39 1.39 0 0 0-1.364-1.655zm0 1.39-1.743 8.968h6.496c4.087 0 6.907.714 8.457 2.14 1.553 1.426 2.017 3.735 1.398 6.93l-3.052 15.699h-7.407l2.901-14.928c.33-1.698.208-2.856-.365-3.474-.573-.617-1.793-.926-3.658-.926h-5.829l-3.756 19.327H51.46l6.558-33.739h7.292z"/><path d="M92.136 67.864c2.793 0 4.878-.515 6.198-1.53 1.304-1.006 2.206-2.747 2.679-5.175.44-2.27.273-3.854-.5-4.71-.788-.874-2.493-1.317-5.067-1.317h-4.463l-2.475 12.732zM77.54 83.547a.694.694 0 0 1-.682-.828l6.557-33.738a.695.695 0 0 1 .682-.561H98.23c4.442 0 7.748 1.206 9.826 3.585 2.089 2.39 2.734 5.734 1.917 9.935a15.878 15.878 0 0 1-1.699 4.724 15.838 15.838 0 0 1-3.128 3.92c-1.53 1.432-3.265 2.472-5.147 3.083-1.852.604-4.232.91-7.071.91h-5.723l-1.633 8.408a.695.695 0 0 1-.683.562z"/><path fill="#fff" d="M91.555 55.826h3.891c3.107 0 4.186.682 4.552 1.089.61.674.724 2.097.333 4.112-.44 2.257-1.254 3.858-2.421 4.756-1.195.92-3.139 1.386-5.773 1.386h-2.786l2.204-11.342zm6.674-8.1H84.096a1.39 1.39 0 0 0-1.363 1.123l-6.558 33.739a1.39 1.39 0 0 0 1.364 1.653h7.35a1.39 1.39 0 0 0 1.363-1.124l1.525-7.846h5.15c2.911 0 5.364-.318 7.286-.944 1.978-.642 3.797-1.731 5.408-3.238a16.52 16.52 0 0 0 3.258-4.086c.832-1.487 1.428-3.147 1.775-4.931.86-4.423.162-7.964-2.076-10.524-2.216-2.537-5.697-3.823-10.35-3.823zM87.666 68.557h4.47c2.964 0 5.17-.557 6.622-1.675 1.45-1.116 2.428-2.98 2.936-5.591.487-2.508.266-4.277-.665-5.308-.93-1.03-2.791-1.546-5.583-1.546h-5.035Zm10.563-19.445c4.251 0 7.354 1.117 9.303 3.348 1.95 2.232 2.537 5.347 1.759 9.346-.32 1.648-.862 3.154-1.624 4.518-.763 1.366-1.76 2.614-2.992 3.747-1.467 1.373-3.097 2.352-4.892 2.935-1.793.584-4.078.875-6.856.875h-6.295l-1.745 8.97h-7.35l6.558-33.739h14.133"/><defs><radialGradient id="a" cx="0" cy="0" r="1" gradientTransform="matrix(84.04136 0 0 84.04136 38.426 42.169)" gradientUnits="userSpaceOnUse"><stop stop-color="#AEB2D5"/><stop offset=".3" stop-color="#AEB2D5"/><stop offset=".75" stop-color="#484C89"/><stop offset="1" stop-color="#484C89"/></radialGradient></defs>
                                </svg>
                            </div>
                            <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center hover:scale-120 transition-transform" title="Tailwind CSS">
                                <svg class="w-6 h-6 text-teal-600" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <!-- Updated footer colors -->
    <footer class="bg-zinc-800/90 backdrop-blur-sm border-t border-zinc-300 text-center py-8">
        <div class="max-w-4xl mx-auto px-4">
            <p class="text-zinc-300">&copy; {{ date('Y') }} TecnoParque - Sistema de Gestión de Semilleros. Todos los derechos reservados.</p>
            <p class="text-zinc-400 text-sm mt-2">Innovando en la gestión de proyectos de investigación</p>
        </div>
    </footer>

    <!-- Added comprehensive JavaScript for animations and typewriter effect -->
    <script>
        // Mobile menu functionality
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Typewriter animation
        const texts = [
            'Sistema de Gestión y Seguimiento',
            'Plataforma de Semilleros TecnoParque',
            'Software de Proyectos Innovadores'
        ];
        
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typewriterElement = document.getElementById('typewriter-text');
        const cursor = document.getElementById('cursor');
        
        function typeWriter() {
            const currentText = texts[textIndex];
            
            if (isDeleting) {
                typewriterElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typewriterElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            let typeSpeed = isDeleting ? 50 : 100;
            
            if (!isDeleting && charIndex === currentText.length) {
                typeSpeed = 2000; // Pause at end
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                typeSpeed = 500; // Pause before next text
            }
            
            setTimeout(typeWriter, typeSpeed);
        }
        
        // Start typewriter animation after page load
        setTimeout(typeWriter, 1000);

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                }
            });
        }, observerOptions);

        // Observe all scroll-animate elements
        document.querySelectorAll('.scroll-animate').forEach(el => {
            observer.observe(el);
        });
    </script>

    <!-- Added custom CSS animations -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-100%); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        .animate-slide-down {
            animation: slideDown 0.8s ease-out;
        }
        
        .animate-slide-up {
            animation: slideUp 0.8s ease-out;
        }
        
        .animate-slide-up-delayed {
            animation: slideUp 0.8s ease-out 0.3s both;
        }
        
        .scroll-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }
        
        .scroll-animate.animate-slide-up {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</body>
</html
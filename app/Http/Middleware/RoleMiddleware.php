<?php
/* 
app/Http/Middleware/RoleMiddleware.php
*/
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Si el usuario no está autenticado
        if (!$user) {
            return redirect()->route('login');
        }

        // Verificar si el usuario tiene alguno de los roles permitidos
        if (!in_array($user->rol, $roles)) {
            // Redirigir a dashboard según el rol actual
            return match($user->rol) {
                'Aprendiz' => redirect()->route('aprendiz.index'),
                'Directora', 'DirectorGrupo' => redirect()->route('dashboard'),
                default => redirect()->route('home')->with('error', 'Acceso denegado para tu rol.')
            };
        }

        return $next($request);
    }
}
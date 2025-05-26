<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani.');
        }

        if (!in_array(Auth::user()->role_id, [2, 3])) {
            return redirect()->route('not-auth')->with('error', 'Nemate dozvolu za pristup.');
        }

        return $next($request);
    }
}

// class AdminOrEditor
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if (!Auth::check()) {
//             return redirect()->route('login')->with('error', 'Morate biti ulogovani.');
//         }

//         $user = Auth::user();
//         if ($user->role_id == 2 || $user->role_id == 3) {
//             return $next($request);
//         }

//         return redirect()->route('not-auth')->with('error', 'Nemate dozvolu za pristup ovoj stranici.');
//     }
// }


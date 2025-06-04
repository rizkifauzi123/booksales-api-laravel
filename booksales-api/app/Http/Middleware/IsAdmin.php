

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;


// class IsAdmin
// {
//     public function handle(Request $request, Closure $next)
//     {
//         //user admin ditandai dengan kolom `is_admin`.
//         if (auth()->check() && auth()->user()->is_admin) {
//             return $next($request);
//         }

//         return response()->json(['message' => 'Unauthorized. Admin only.'], 403);
//     }
// }

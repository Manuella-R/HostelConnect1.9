<? 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCaretaker
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 'caretaker') {
            return $next($request);
        }

        return redirect('/')->withErrors('Access denied');
    }
}

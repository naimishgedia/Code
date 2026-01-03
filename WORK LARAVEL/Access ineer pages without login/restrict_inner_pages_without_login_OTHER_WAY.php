<?php
Step 1: Create Middleware
You can generate a middleware using the following Artisan command:

php artisan make:middleware AuthenticateMiddleware


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

===================

Step 2: Apply Middleware
Apply the middleware to the routes or route groups that you want to protect. You can do this in your web.php routes file:


Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Add other routes here...
});
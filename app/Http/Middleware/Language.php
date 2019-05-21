<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // http://localhost:8080/en/posts/ipsa-quia-officia-sunt-et-et-ut
        // http://localhost:8080/it/posts/ipsa-quia-officia-sunt-et-et-ut
        $locale = $request->segment(1);

        $locales = config('app.locales');

        // if (! in_array($locale, array_keys($locale))) {
        if (empty($locales[$locale])) {
            $segments = $request->segments();

            array_unshift($segments, config('app.fallback_locale'));

            return redirect()->to(join('/', $segments));
        }

        // Il problema


        // Happy path
        // $locale = 'it'
        app()->setLocale($locale);

        return $next($request);
    }
}

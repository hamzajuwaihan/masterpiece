<?php

namespace App\Http\Middleware;

use App\Models\CourseType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GetCourseTypes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Define a cache key
        $cacheKey = 'courseTypes';

        // Check if the data is already in the cache
        $courseTypes = Cache::get($cacheKey);

        // If the data is not in the cache, fetch it from the database and store it in the cache
        if (!$courseTypes) {
            $courseTypes = CourseType::all();
            Cache::put($cacheKey, $courseTypes, now()->addMinutes(120));
        }

        // Pass the data to the request object
        $request->attributes->add(['courseTypes' => $courseTypes]);

        return $next($request);
    }
}

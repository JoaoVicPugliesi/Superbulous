<?php

namespace App\Http\Controllers;

use App\Services\HeroService\HeroService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $name = $request->input('search') ?? 'batman';
        
        $cacheKey = 'character_' . $name;
        
        $characters = cache()->remember($cacheKey, now()->addMonth(), function() use($name) {
            $service = new HeroService();
            return $service->characters()->search($name);
        });
        
        return Inertia::render('Dashboard', ['characters' => $characters]);
    }
}

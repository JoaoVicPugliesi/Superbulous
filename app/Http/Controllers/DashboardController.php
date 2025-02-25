<?php

namespace App\Http\Controllers;

use App\Services\HeroService\HeroService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request) {
        
        $name = $request->input('search') ?? 'batman';
        $page = (int) $request->input('page', 1);
        $perPage = 10;
    
        $cacheKey = 'character_' . $name;
    
        $characters = cache()->remember($cacheKey, now()->addMonth(), function() use ($name) {
            $service = new HeroService();
            return $service->characters()->search($name);
        });
    
        $paginatedCharacters = $characters->forPage($page, $perPage)->values();
    
        return Inertia::render('Dashboard', [
            'characters' => $paginatedCharacters,
            'pagination' => [
                'total' => $characters->count(),
                'perPage' => $perPage,
                'currentPage' => $page,
                'lastPage' => (int) ceil($characters->count() / $perPage),
            ],
        ]);
    }
    
}

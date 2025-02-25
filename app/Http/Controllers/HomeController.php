<?php

namespace App\Http\Controllers;

use App\Services\HeroService\HeroService;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {

    $id = 70;

    $cacheKey = 'character_' . $id;

    $character = cache()->remember($cacheKey, now()->addMonth(), function() use($id) {
        $service = new HeroService();
        return $service->characters()->get($id);
    });

        return Inertia::render('Home', ['character' => $character]);
    }
}

<?php

namespace App\Services\HeroService\Endpoints;

use App\Services\HeroService\Entities\Character as EntitiesCharacter;
use App\Services\HeroService\HeroService;
use Illuminate\Support\Collection;

class Characters {

    private $service;

    public function __construct()
    {
        $this->service = new HeroService();
    }

    public function get(Int $id): mixed {
        $response = $this->service
        ->api
        ->withoutVerifying()
        ->get('/' . $id);

        $character = $response->json() ?? [];

        return new EntitiesCharacter($character);
    }

    public function search(String $name): Collection {
        $response = $this->service
        ->api
        ->withoutVerifying()
        ->get('/search/' . $name);

        $characters = $response->json()['results'] ?? [];

        return collect($characters)
        ->map(fn($character) => new EntitiesCharacter($character));
    }
}
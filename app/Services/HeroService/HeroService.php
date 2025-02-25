<?php

namespace App\Services\HeroService;

use App\Services\HeroService\Endpoints\HasCharacters;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class HeroService {

    use HasCharacters;
    public PendingRequest $api;

    private String $token;

    public function __construct()
    {
        $this->token = config('app.hero_token');
        $this->api = Http::baseUrl('https://superheroapi.com/api/' . $this->token);
    }
}
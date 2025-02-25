<?php

namespace App\Services\HeroService\Endpoints;

trait HasCharacters {
    public function characters(): Characters {
        return new Characters();
    }
}
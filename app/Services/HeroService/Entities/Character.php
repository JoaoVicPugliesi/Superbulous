<?php

namespace App\Services\HeroService\Entities;

class Character {

    public String $id;
    public String $name;
    public String $identity;
    public String $image;
    public String $publisher;
    public String $race;
    public String $height;
    public String $weight;
    public array $stats;

    public function __construct(array $data)
    {
        $this->id = data_get($data, 'id');
        $this->name = data_get($data, 'name');
        $this->image = data_get($data, 'image.url');
        $this->identity = data_get($data, 'biography.full-name');
        $this->publisher = data_get($data, 'biography.publisher');
        $this->race = data_get($data, 'appearance.race');

        // Height Logic

        $height = collect(data_get($data, 'appearance.height'))
                  ->toArray();
        $height = implode(' | ', $height);
        $this->height = $height;

        // Weight Logic

        $weight = collect(data_get($data, 'appearance.weight'))
                        ->toArray();
        $weight = implode(' | ', $weight);
        $this->weight = $weight;
        
        $this->stats = collect(data_get($data, 'powerstats'))
                       ->toArray();
    }
}
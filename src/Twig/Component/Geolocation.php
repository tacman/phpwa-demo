<?php

namespace App\Twig\Component;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ComponentToolsTrait;

#[AsLiveComponent('Geolocation')]
class Geolocation
{
    use DefaultActionTrait;
    use ComponentToolsTrait;

    #[LiveProp()]
    public int $zoom = 3;

    #[LiveProp()]
    public float $latitude = 0.0;

    #[LiveProp()]
    public float $longitude = 0.0;

    #[LiveListener('geolocation:position')]
    public function onPosition(#[LiveArg] float $latitude, #[LiveArg] float $longitude): void
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->zoom = 12;
    }
}

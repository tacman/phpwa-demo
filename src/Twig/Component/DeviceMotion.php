<?php

namespace App\Twig\Component;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ComponentToolsTrait;

#[AsLiveComponent('DeviceMotion')]
class DeviceMotion
{
    use DefaultActionTrait;
    use ComponentToolsTrait;

    #[LiveProp()]
    public null|float $alpha = 30;

    #[LiveProp()]
    public null|float $beta = 60;

    #[LiveProp()]
    public null|float $gamma = 90;

    #[LiveListener('device:orientation')]
    public function onDeviceOrientation(#[LiveArg] null|float $alpha, #[LiveArg] null|float $beta, #[LiveArg] null|float $gamma): void
    {
        $this->alpha = $alpha;
        $this->beta = $beta;
        $this->gamma = $gamma;
    }
}

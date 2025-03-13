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

    /**
     * @var array{x: null|float, y: null|float, z: null|float}
     */
    #[LiveProp()]
    public null|array $acceleration = ['x' => null, 'y' => null, 'z' => null];

    /**
     * @var array{x: null|float, y: null|float, z: null|float}
     */
    #[LiveProp()]
    public null|array $accelerationIncludingGravity = ['x' => null, 'y' => null, 'z' => null];

    /**
     * @var array{alpha: null|float, beta: null|float, gamma: null|float}
     */
    #[LiveProp()]
    public null|array $rotationRate = ['alpha' => null, 'beta' => null, 'gamma' => null];

    #[LiveProp()]
    public null|float $interval = 0;

    /**
     * @param array{alpha?: float, beta?: float, gamma?: float}|null $rotationRate
     * @param array{x?: float, y?: float, z?: float}|null $acceleration
     * @param array{x?: float, y?: float, z?: float}|null $accelerationIncludingGravity
     */
    #[LiveListener('pwa:device:motion')]
    public function onDeviceMotion(#[LiveArg] null|array $acceleration, #[LiveArg] null|array $accelerationIncludingGravity, #[LiveArg] null|array $rotationRate, #[LiveArg] null|float $interval): void
    {
        $this->acceleration = $this->prepareAcceleration($acceleration ?? []);
        $this->accelerationIncludingGravity = $this->prepareAcceleration($accelerationIncludingGravity ?? []);
        $this->rotationRate = $this->prepareRotationRate($rotationRate ?? []);
        $this->interval = $interval;
    }

    /**
     * @param array{x?: float, y?: float, z?: float} $acceleration
     * @return array{x: null|float, y: null|float, z: null|float}
     */
    private function prepareAcceleration(array $acceleration): array
    {
        return ['x' => $acceleration['x'] ?? null, 'y' => $acceleration['y'] ?? null, 'z' => $acceleration['z'] ?? null];
    }

    /**
     * @param array{alpha?: float, beta?: float, gamma?: float} $rotationRate
     * @return array{alpha: null|float, beta: null|float, gamma: null|float}
     */
    private function prepareRotationRate(array $rotationRate): array
    {
        return ['alpha' => $rotationRate['alpha'] ?? null, 'beta' => $rotationRate['beta'] ?? null, 'gamma' => $rotationRate['gamma'] ?? null];
    }
}

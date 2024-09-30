<?php

namespace App\PreloadGenerator;

use SpomkyLabs\PwaBundle\CachingStrategy\PreloadUrlsGeneratorInterface;
use SpomkyLabs\PwaBundle\Dto\Url;
use SpomkyLabs\PwaBundle\Dto\Manifest;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class StaticPagesUrlPreloadGenerator implements PreloadUrlsGeneratorInterface
{
    public function __construct(
        #[Autowire('%kernel.enabled_locales%')]
        private array $locales,
    ){}

    public function getAlias(): string
    {
        return 'static_pages';
    }

    /**
     * @return iterable<Url|string>
     */
    public function generateUrls(): iterable
    {
        foreach ($this->locales as $locale) {
            yield Url::create(
                'app_homepage',
                [
                    '_locale' => $locale,
                ]
            );
        }
    }
}

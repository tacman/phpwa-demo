<?php

namespace App\PreloadGenerator;

use SpomkyLabs\PwaBundle\CachingStrategy\PreloadUrlsGeneratorInterface;
use SpomkyLabs\PwaBundle\Dto\Url;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final class StaticPagesUrlPreloadGenerator implements PreloadUrlsGeneratorInterface
{
    private null|array $urls = null;

    public function __construct(
        #[Autowire('%kernel.enabled_locales%')]
        private readonly array $locales,
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
        if (null === $this->urls) {
            foreach ($this->locales as $locale) {
                $this->urls[] = Url::create(
                    'app_homepage',
                    [
                        '_locale' => $locale,
                    ]
                );
            }
        }

        yield from $this->urls;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'items')]
#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Delete(),
        new Patch(uriTemplate: '/items/{id}/toggle', openapiContext: ['summary' => 'Toggle the item status'], input: null, output: Item::class)

    ]
)]
#[ApiFilter(OrderFilter::class, properties: ['id', 'name'], arguments: ['orderParameterName' => 'order'])]
class Item
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: Types::STRING, length: 255)]
        #[ORM\GeneratedValue(strategy: 'NONE')]
        public string $id,
        #[ORM\Column(type: Types::TEXT)]
        public string $name,
        #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
        public \DateTimeImmutable $createdAt,
        #[ORM\Column]
        public bool $done = false
    ){
    }

    public function toggle(): void
    {
        $this->done = !$this->done;
    }
}

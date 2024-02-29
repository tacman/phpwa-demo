<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'items')]
#[ORM\Entity(repositoryClass: ItemRepository::class)]
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

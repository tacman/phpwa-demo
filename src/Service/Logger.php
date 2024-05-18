<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

final readonly class Logger implements LoggerInterface
{
    public function __construct(
        private LoggerInterface $pwaLogger
    ){
    }

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->emergency($message, $context);
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->alert($message, $context);
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->critical($message, $context);
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->error($message, $context);
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->warning($message, $context);
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->notice($message, $context);
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->info($message, $context);
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->debug($message, $context);
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->pwaLogger->log($level, $message, $context);
    }
}

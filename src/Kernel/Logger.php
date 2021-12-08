<?php

/**
 * @author: Julien Mercier-Rojas <julien@jeckel-lab.fr>
 * Created at: 26/11/2021
 */

declare(strict_types=1);

namespace JeckelLab\Demo\Kernel;

use DateTimeImmutable;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    /**
     * @param string              $level
     * @param \Stringable|string $message
     * @param array<mixed> $context
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        printf(
            "[%s] %s : %s\n",
            (new DateTimeImmutable())->format('H:i:s'),
            $level,
            (string) $message
        );
    }
}

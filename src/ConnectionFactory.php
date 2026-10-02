<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @psalm-mutable
 */
interface ConnectionFactory
{
    /**
     * @psalm-impure
     */
    public function createContext(): Context;
}
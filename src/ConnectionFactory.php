<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @psalm-purity-template P <= read-globals|write-globals
 * @psalm-capabilities read-props|write-this-props|read-globals|write-globals|io
 */
interface ConnectionFactory
{
    /**
     * @psalm-capabilities read-props
     * @psalm-purity-from-template P
     */
    public function createContext(): Context;
}
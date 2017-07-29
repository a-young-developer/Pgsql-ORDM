<?php

namespace Cable\Ordm\Blueprint\Statement;

use Cable\Ordm\Blueprint\Statement;

/**
 * Class NotNull
 * @package Cable\Ordm\Blueprint\Statement
 */
final class NotNull extends Statement
{
    /**
     * NotNull constructor.
     */
    public function __construct()
    {
        $this->setState('NOT NULL');
  }
}

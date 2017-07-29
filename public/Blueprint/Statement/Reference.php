<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class Reference
 * @package Cable\Ordm\Blueprint\Statement
 */
final class Reference extends Statement
{

    /**
     * Reference constructor.
     * @param $table
     * @param $target
     */
    public function __construct($table, $target)
    {
        $this->setState(sprintf('REFERENCES %s (%s)', $table, $target));
    }
}

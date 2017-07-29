<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class CreateTable
 * @package Cable\Ordm\Blueprint\Statement
 */
class CreateTable extends Statement
{

    /**
     * CreateTable constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->setState(sprintf('CREATE TABLE %s', $table));
    }
}

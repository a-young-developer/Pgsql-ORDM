<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

class CreateTableNotExists extends Statement
{


    /**
     * CreateTable constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->setState(sprintf('CREATE TABLE %s IF NOT EXISTS', $table));
    }
}

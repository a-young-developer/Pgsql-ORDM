<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

class CreateIndexUsing extends Statement
{

    /**
     * CreateIndexUsing constructor.
     * @param string $table
     * @param string $engine
     * @param string $column
     */
    public function __construct(string $table, string $engine, string $column)
    {
        $this->setState(
            sprintf('CREATE INDEX ON %s USING %s (%s)', $table, $engine, $column)
        );
    }

}
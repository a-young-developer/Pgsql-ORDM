<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

class IndexUsing extends Statement
{


    /**
     * IndexUsing constructor.
     * @param string $engine
     * @param string $column
     */
    public function __construct(string $engine, string $column)
    {
        $this->setState(
            sprintf('USING %s (%s)', $engine, $column)
        );
    }

}
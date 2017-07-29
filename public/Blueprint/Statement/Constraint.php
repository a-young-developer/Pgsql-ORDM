<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;


/**
 * Class Constraint
 * @package Cable\Ordm\Blueprint\Statement
 */
final class Constraint extends Statement
{

    /**
     * Constraint constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setState(sprintf('CONSTRAINT %s', $name));
    }
}
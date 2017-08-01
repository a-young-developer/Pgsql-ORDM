<?php
namespace Cable\Ordm\Query\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class Limit
 * @package Cable\Ordm\Query\Statement
 */
class Limit extends Statement
{

    /**
     * Limit constructor.
     * @param int $limit
     * @param int $offset
     */
    public function __construct(int $limit, int $offset)
    {
        $this->setState(
            sprintf('LIMIT %d OFFSET %d', $limit, $offset)
        );
    }
}

<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class AlterColumn
 * @package Cable\Ordm\Blueprint\Statement
 */
class AlterColumn extends Statement
{
    /**
     * AlterColumn constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->setState(sprintf('ALTER COLUMN `%s`', $table));
    }
}
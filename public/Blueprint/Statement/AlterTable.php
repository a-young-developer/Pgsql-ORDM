<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class AlterTable
 * @package Cable\Ordm\Blueprint\Statement
 *
 */
class AlterTable extends Statement
{

    /**
     * AlterTable constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->setState(sprintf('ALTER TABLE `%s`', $table));
    }
}

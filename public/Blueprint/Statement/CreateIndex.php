<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class CreateIndex
 * @package Cable\Ordm\Blueprint\Statement
 */
class CreateIndex extends Statement
{

    /**
     * CreateIndex constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->setState(
            sprintf('CREATE INDEX ON `%s`', $table)
        );
    }
}

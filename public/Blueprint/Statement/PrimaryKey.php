<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class PrimaryKey
 * @package Cable\Ordm\Blueprint\Statement
 */
final class PrimaryKey extends Statement
{

    /**
     * PrimaryKey constructor.
     */
    public function __construct()
    {
        $this->setState('PRIMARY KEY');
    }

}

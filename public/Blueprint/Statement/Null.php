<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class NullType
 * @package Cable\Ordm\Blueprint\Statement
 */
class NullType extends Statement
{

    public function __construct()
    {
        $this->setState('NULL');
    }
}

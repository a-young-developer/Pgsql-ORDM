<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class Cascade
 * @package Cable\Ordm\Blueprint\Statement
 */
final class Cascade extends Statement
{
    /**
     * Cascade constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->setState(sprintf('ON %s CASCADE', mb_convert_case($type, MB_CASE_UPPER)));
    }
}

<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

final class DefaultStatement extends Statement
{
    /**
     * DefaultStatement constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->setState(sprintf('DEFAULT %s', $value));
    }
}

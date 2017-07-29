<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class Foreign
 * @package Cable\Ordm\Blueprint\Statement
 */
final class ForeignKey extends Statement
{

    /**
     * Foreign constructor.
     * @param $from
     */
    public function __construct($from)
    {
        $this->setState(sprintf('FOREIGN KEY (%s)', $from));
    }

}

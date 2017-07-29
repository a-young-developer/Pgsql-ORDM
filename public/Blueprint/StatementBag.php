<?php
namespace Cable\Ordm\Blueprint;


class StatementBag extends Statement
{

    /**
     * @var Statement[]
     */
    protected $statements;

    /**
     * StatementBag constructor.
     * @param Statement[] $statements
     */
    public function __construct(array $statements = [])
    {
       $this->statements = $statements;
    }

    /**
     * @return string
     */
    public function getState() : string
    {
        return implode(' ', $this->statements);
    }

}


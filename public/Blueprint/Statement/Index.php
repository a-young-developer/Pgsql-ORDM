<?php
namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\Column;
use Cable\Ordm\Blueprint\StatementBag;

class Index extends StatementBag
{

    /**
     * @var Column
     */
    private $column;

    /**
     * @return Column
     */
    public function getColumn(): Column
    {
        return $this->column;
    }

    /**
     * @param Column $column
     * @return Index
     */
    public function setColumn(Column $column): Index
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @param array|string $engine
     * @return $this
     */
    public function engine($engine){
        $column = $this->getColumn()->getName();

        if (is_array($engine)) {
            list($engine, $type) = $engine;
            $this->statements[] = new IndexUsing($engine, "$column $type");
        }else{
            $this->statements[] = new IndexUsing($engine, $column);
        }

        return $this;
    }

}

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
     * @var string
     */
    private $table;

    /**
     * @var string|array|null
     */
    private $engine;

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
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param string $table
     * @return Index
     */
    public function setTable(string $table): Index
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        $column = $this->getColumn()->getName();


        if (null === $this->engine) {
            $index = new CreateIndex($this->table, $column);
        } else {
            list($engine, $type) = $this->engine;
            $index = new CreateIndexUsing($this->table, $engine, "$column $type");
        }

        return $index->getState();
    }

    /**
     * @param array|string $engine
     * @return $this
     */
    public function engine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

}

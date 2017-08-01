<?php
namespace Cable\Ordm;

use Cable\Ordm\Blueprint\Column;

/**
 * Class Metadata
 * @package Cable\Ordm
 */
class Metadata
{

    /**
     * @var string
     */
    private $table;


    /**
     * @var Column[]
     */
    private $columns;

    /**
     * Metadata constructor.
     * @param string $table
     * @param array $columns
     */
    public function __construct(string $table, array $columns)
    {
        $this->setTable($table)
            ->setColumns($columns);
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
     * @return Metadata
     */
    public function setTable(string $table): Metadata
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return Column[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param Column[] $columns
     * @return Metadata
     */
    public function setColumns(array $columns): Metadata
    {
        $this->columns = $columns;
        return $this;
    }


}

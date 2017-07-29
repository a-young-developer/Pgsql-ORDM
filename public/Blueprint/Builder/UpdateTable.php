<?php

namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Blueprint;
use Cable\Ordm\Blueprint\Statement\AlterTable;

/**
 * Class UpdateTable
 * @package Cable\Ordm\Blueprint\Builder
 */
class UpdateTable extends Builder implements BuilderInterface
{

    /**
     * @var AlterTable
     */
    private $alterQuery;

    /**
     * UpdateTable constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->alterQuery = new AlterTable($table);
    }

    /**
     * build query string
     *
     * @param Blueprint $blueprint
     * @return string
     */
    public function buildQuery(Blueprint $blueprint): string
    {
        $query = "";
        $columns = $blueprint->getColumns();

        foreach ($columns as $column) {
            $columnQuery = (string)$this->alterQuery . ' ADD ' . $this->buildColumnQuery($column) . ';';

            foreach ($column->getConstraints() as $constraint) {
                $columnQuery .= (string)$this->alterQuery . ' ADD ' . $this->buildConstraintQuery($constraint) . ';';
            }

            $query .= $columnQuery;
        }

        return $query;
    }
}

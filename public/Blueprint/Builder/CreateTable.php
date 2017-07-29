<?php

namespace Cable\Ordm\Blueprint\Builder;
use Cable\Ordm\Blueprint\Blueprint;
use Cable\Ordm\Blueprint\Statement;

/**
 * Class CreateTable
 * @package Cable\Ordm\Blueprint\Builder
 */
class CreateTable  extends Builder implements BuilderInterface
{

    /**
     * @var Statement
     */
    private $createStatement;


    /**
     * CreateTable constructor.
     * @param string $table
     * @param bool $notExists
     */
    public function __construct(string $table, $notExists = false )
    {
        $this->createStatement = $notExists === false ?
            new Statement\CreateTable($table) :
            new Statement\CreateTableNotExists($table);
    }

    /**
     * build query string
     * @param Blueprint $blueprint
     * @return string
     */
    public function buildQuery(Blueprint $blueprint): string
    {

        $query = $this->createStatement->getState(). '(';
        $columns = $blueprint->getColumns();

        foreach ($columns as $column){
           $query .= $this->buildColumnQuery($column). ',';
        }

        foreach ($columns as $column){
            if (empty($column->getConstraints())) {
                continue;
            }

            foreach ($column->getConstraints() as $constraint){
                $query .= $this->buildConstraintQuery($constraint);
            }
        }

        $query = rtrim($query, ',');
        $query .= ');';

        return $query;
    }

}

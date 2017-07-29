<?php

namespace Cable\Ordm\Blueprint\Builder;
use Cable\Ordm\Blueprint\Blueprint;
use Cable\Ordm\Blueprint\Column;
use Cable\Ordm\Blueprint\Statement;
use Cable\Ordm\Blueprint\StatementBag;
use Cable\Ordm\Types\Type;

/**
 * Class CreateTable
 * @package Cable\Ordm\Blueprint\Builder
 */
class CreateTable implements BuilderInterface
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
     *
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

    /**
     * @param StatementBag $bag
     * @return string
     */
    private function buildConstraintQuery(StatementBag $bag){
        return (string) $bag;
    }

    /**
     * @param Column $column
     * @return string
     */
    public function buildColumnQuery(Column $column){
        $type = $this->buildTypeQuery($column->getType(), $column->getParameters());

        return sprintf(
            '%s %s %s',
            $column->getName(),
            $type,
            implode(' ',$column->getStatements())
        );
    }


    /**
     * @param Type $type
     * @param array $parameters
     * @return string
     */
    public function buildTypeQuery(Type $type, array $parameters){
        if (empty($parameters)) {
            return $type->getName();
        }


        return sprintf('%s(%s)', $type->getName(), implode(',', $parameters));
    }
}

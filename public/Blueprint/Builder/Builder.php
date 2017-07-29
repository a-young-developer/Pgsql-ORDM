<?php
namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Column;
use Cable\Ordm\Blueprint\StatementBag;
use Cable\Ordm\Types\Type;

/**
 * Class Builder
 * @package Cable\Ordm\Blueprint\Builder
 */
class Builder
{
    /**
     * @param StatementBag $bag
     * @return string
     */
    protected function buildConstraintQuery(StatementBag $bag){
        return (string) $bag;
    }

    /**
     * @param Column $column
     * @return string
     */
    protected function buildColumnQuery(Column $column){
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
    protected function buildTypeQuery(Type $type, array $parameters){
        if (empty($parameters)) {
            return $type->getName();
        }


        return sprintf('%s(%s)', $type->getName(), implode(',', $parameters));
    }
}

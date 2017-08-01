<?php
namespace Cable\Ordm\Query\Statement;


use Cable\Ordm\Blueprint\Statement;

class OrderBy extends Statement
{


    /**
     * OrderBy constructor.
     * @param $column
     * @param string $type
     */
    public function __construct($column, string $type){
        if (is_array($column)) {
            $column = implode(',', $column);
        }

        $this->setState(
            sprintf(
                'ORDER BY %s %s', $column, $type
            )
        );
    }

}
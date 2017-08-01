<?php
namespace Cable\Ordm\Query\Statement;


use Cable\Ordm\Blueprint\Statement;

/**
 * Class GroupBy
 * @package Cable\Ordm\Query\Statement
 */
class GroupBy extends Statement
{

    /**
     * GroupBy constructor.
     * @param $group
     */
    public function __construct($group)
    {
        if (is_array($group)) {
            $group = implode(',', $group);
        }


        $this->setState(
            sprintf(
                'GROUP BY %s', $group
            )
        );
    }
}

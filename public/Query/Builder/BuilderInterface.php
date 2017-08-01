<?php
namespace Cable\Ordm\Query\Builder;

use Cable\Ordm\Query\Blueprint;

/**
 * Interface BuilderInterface
 * @package Cable\Ordm\Query\Builder
 */
interface BuilderInterface
{

    /**
     * @param Blueprint $blueprint
     * @return string
     */
    public function buildQuery(Blueprint $blueprint) : string;
}
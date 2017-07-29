<?php
/**
 * Created by PhpStorm.
 * User: gokhansaglam
 * Date: 29.07.2017
 * Time: 16:04
 */

namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Blueprint;

/**
 * Interface BuilderInterface
 * @package Cable\Ordm\Blueprint\Builder
 */
interface BuilderInterface
{

    /**
     * build query string
     *
     * @return string
     */
    public function buildQuery(Blueprint $blueprint) : string ;

}

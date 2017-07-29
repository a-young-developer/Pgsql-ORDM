<?php
namespace Cable\Ordm;

use Cable\Ordm\Types\Type;

/**
 * Class TypeBag
 * @package Cable\Ordm
 */
final class TypeBag extends \ParameterBag
{

    /**
     * TypeBag constructor.
     * @param array $type
     */
    public function __construct(array $type = [])
    {
        if (!empty($type)) {
            $this->loadType($type);
        }
    }

    /**
     * @param array $types
     */
    public function loadType(array $types){
        foreach ($types as $index => $value){
            $value = new $value;

            /**
             * @var Type $value
             */


            $this->set($value->getName(), $value);
        }
    }
}

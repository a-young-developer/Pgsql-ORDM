<?php

namespace Cable\Ordm\Types;

/**
 * Class FloatType
 * @package Cable\Ordm\Types
 */
class FloatType extends Type
{


    protected $name = 'float';

    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertToDatabase($data)
    {
        return (float) $data;
    }

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertFromDatabase($data)
    {
        return (float) $data;
    }
}
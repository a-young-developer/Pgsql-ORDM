<?php
namespace Cable\Ordm\Types;

/**
 * Class StringType
 * @package Cable\Ordm\Types
 */
class StringType extends Type
{


    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertToDatabase($data)
    {
        return (string) $data;
    }

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertFromDatabase($data)
    {
        return (string) $data;
    }
}

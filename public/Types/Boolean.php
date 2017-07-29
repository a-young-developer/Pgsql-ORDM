<?php
namespace Cable\Ordm\Types;


/**
 * Class Boolean
 * @package Cable\Ordm\Types
 */
class Boolean extends Type
{


    protected $name = "boolean";

    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertToDatabase($data)
    {
        return $data === 1 || $data === true ? true : false;
    }

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertFromDatabase($data)
    {
        return $data === 1 || $data === "1" ? true : false;
    }
}

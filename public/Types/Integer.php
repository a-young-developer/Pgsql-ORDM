<?php
namespace Cable\Ordm\Types;


class Integer extends Type
{

    protected $name = 'int';

    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertToDatabase($data)
    {
        return (int) $data;
    }

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertFromDatabase($data)
    {
        return (int) $data;
    }
}

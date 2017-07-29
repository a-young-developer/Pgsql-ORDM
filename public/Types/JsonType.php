<?php

namespace Cable\Ordm\Types;


class JsonType extends Type
{

    protected $name = 'json';

    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertToDatabase($data)
    {
        return json_encode($data);
    }

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    public function convertFromDatabase($data)
    {
        return json_decode($data);
    }
}

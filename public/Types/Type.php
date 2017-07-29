<?php
namespace Cable\Ordm\Types;

abstract class Type
{


    /**
     * the name of type
     *
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Type
     */
    public function setName(string $name): Type
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param  mixed $data can be any type
     * @return mixed can be any type
     */
    abstract public function convertToDatabase($data);

    /**
     * @param mixed $data can be any type
     * @return mixed can be any type
     */
    abstract public function convertFromDatabase($data);
}

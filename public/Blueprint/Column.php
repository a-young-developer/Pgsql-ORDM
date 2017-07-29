<?php
namespace Cable\Ordm\Blueprint;
use Cable\Ordm\Types\Type;

/**
 * Class Column
 * @package Cable\Ordm\Blueprint
 */
final class Column
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var Type
     */
    private $type;



    /**
     * Column constructor.
     * @param string  $name
     * @param Type $type
     */
    public function __construct(string $name, array $parameters, Type $type)
    {
        $this->setName($name)
            ->setType($type)
            ->setParameters($parameters);
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return Column
     */
    public function setParameters(array $parameters): Column
    {
        $this->parameters = $parameters;
        return $this;
    }


    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Column
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return Column
     */
    public function setType(Type $type)
    {
        $this->type = $type;
        return $this;
    }
}

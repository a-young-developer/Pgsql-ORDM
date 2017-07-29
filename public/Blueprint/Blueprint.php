<?php

namespace Cable\Ordm\Blueprint;

use Cable\Ordm\Exceptions\TypeNotExistsException;
use Cable\Ordm\TypeBag;
use Cable\Ordm\Types\Type;

/**
 * Class Blueprint
 * @package Cable\Ordm\Blueprint
 */
final class Blueprint
{
    /**
     * @var Column[]
     */
    private $columns;

    /**
     * @var array
     */
    private $typeBag;

    /**
     * Blueprint constructor.
     * @param TypeBag $typeBag
     */
    public function __construct(TypeBag $typeBag)
    {
        $this->typeBag = $typeBag;
    }

    /**
     * @return Column[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param Column[] $columns
     * @return Blueprint
     */
    public function setColumns(array $columns): Blueprint
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @param string $typeName
     * @return mixed
     * @throws TypeNotExistsException
     */
    public function getType(string $typeName){
        if (!$this->typeBag->has($typeName)) {
            throw new TypeNotExistsException(
                sprintf('%s type not found', $typeName)
            );
        }

        return $this->typeBag->get($typeName);
    }

    /**
     * @param string $name
     * @return Blueprint
     */
    public function pk(string $name) : Column{
        return $this->serial($name)
            ->notNull()
            ->primaryKey();
    }

    /**
     * add a new varchar column
     *
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function varchar(string $name, int $length){
        return $this->addColumn(
            $name, $this->getType('varchar'), [$length]
        );
    }

    /**
     * add a new char column
     *
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function char(string $name, int $length){
        return $this->addColumn(
            $name, $this->getType('char'), [$length]
        );
    }


    /**
     * add a new text column
     *
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function text(string $name, int $length){
        return $this->addColumn(
            $name, $this->getType('text'), [$length]
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function json(string $name){
        return $this->addColumn(
            $name, $this->getType('json')
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function jsonb(string $name){
        return $this->addColumn(
            $name, $this->getType('jsonb')
        );
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function int(string $name,int $length){
        return $this->addColumn(
            $name, $this->getType('int'), [$length]
        );
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function bigint(string $name, int $length){
        return $this->addColumn(
            $name, $this->getType('bigint'), [$length]
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function serial(string $name){
        return $this->addColumn(
            $name, $this->getType('serial'), []
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function smallSerial(string $name){
        return $this->addColumn(
            $name, $this->getType('smallserial'), []
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function bigSerial(string $name){
        return $this->addColumn(
            $name, $this->getType('bigserial'), []
        );
    }

    /**
     * @param string $name
     * @param int $precision
     * @return Column
     */
    public function float(string $name, int $precision){
        return $this->addColumn(
            $name, $this->getType('float'), [$precision]
        );
    }

    /**
     * dynamic type
     *
     * @param $name
     * @param $arguments
     * @return Column
     */
    public function __call($name, $arguments)
    {
        if (!isset($arguments[0])) {
            throw new \UnexpectedValueException(
                'you must specify a name'
            );
        }

        $n = $arguments[0];

        unset($arguments[0]);

        return $this->addColumn($n, $this->getType($name), $arguments);
    }

    /**
     * @param string $name
     * @param Type $type
     * @param array $parameters
     * @return Column
     */
    public function addColumn(string $name, Type $type, array $parameters = []){
        return $this->columns[] = new Column($name, $parameters, $type);
    }
}

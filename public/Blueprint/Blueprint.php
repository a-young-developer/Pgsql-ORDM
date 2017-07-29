<?php

namespace Cable\Ordm\Blueprint;

use Cable\Ordm\Types\Bigint;
use Cable\Ordm\Types\Char;
use Cable\Ordm\Types\Jsonb;
use Cable\Ordm\Types\JsonType;
use Cable\Ordm\Types\Text;
use Cable\Ordm\Types\Type;
use Cable\Ordm\Types\Varchar;
use Cable\Ordm\Types\Integer;

final class Blueprint
{
    /**
     * @var Column[]
     */
    private $columns;

    /**
     * add a new varchar column
     *
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function varchar(string $name, int $length){
        return $this->addColumn(
            $name, new Varchar(), [$length]
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
            $name, new Char(), [$length]
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
            $name, new Text(), [$length]
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function json(string $name){
        return $this->addColumn(
            $name, new JsonType()
        );
    }

    /**
     * @param string $name
     * @return Column
     */
    public function jsonb(string $name){
        return $this->addColumn(
            $name, new Jsonb()
        );
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function int(string $name,int $length){
        return $this->addColumn(
            $name, new Integer(), [$length]
        );
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function bigint(string $name, int $length){
        return $this->addColumn(
            $name, new Bigint(), [$length]
        );
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

<?php
namespace Cable\Ordm\Mapper;

use ReflectionClass;

/**
 * Interface ClassMapperInterface
 * @package Cable\Ordm\Mapper
 */
interface ClassMapperInterface
{

    /**
     * @param ReflectionClass $class
     * @return mixed
     */
    public function mapClass(ReflectionClass $class);
}

<?php
namespace Cable\Ordm\Annotations;

use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class Column
 * @package Cable\Ordm\Annotations
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Column
{


    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $length;


    /**
     * @var string
     *
     * @Required()
     */
    public $type;

    /**
     * @var array
     */
    public $options;

    /**
     * @var boolean
     */
    public $unique = false;

}


/**
 * Class Table
 *
 * @Annotation
 */
class Table
{

    /**
     * @var string
     */
    public $name;

}

/**
 * Class Index
 * @package Cable\Ordm\Annotations
 *
 * @Annotation
 */
class Index {


    /**
     * @var bool
     */
    public $unique = false;

    /**
     * @var string
     */
    public $engine;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     *
     * @Enum({"ASC", "DESC"})
     */
    public $sorting;

}

<?php
namespace Cable\Ordm\Annotations;


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

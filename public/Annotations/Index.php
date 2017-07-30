<?php
namespace Cable\Ordm\Annotations;


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

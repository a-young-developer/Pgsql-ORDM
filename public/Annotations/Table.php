<?php
namespace Cable\Ordm\Annotations;

use Cable\Annotation\Command;

/**
 * Class Table
 *
 * @Name("Table")
 */
class Table extends Command
{

    /**
     * @Annotation()
     *
     * @Required()
     */
    public $name;

}

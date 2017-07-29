<?php
namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Blueprint;
use Cable\Ordm\Blueprint\Statement\AlterColumn;
use Cable\Ordm\Blueprint\Statement\AlterTable;

/**
 * Class UpdateColumn
 * @package Cable\Ordm\Blueprint\Builder
 */
class UpdateColumn extends Builder implements BuilderInterface
{

    /**
     * @var AlterTable
     */
    private $alertTable;

    /**
     * @var AlterColumn
     */
    private $alertColumn;

    /**
     * UpdateColumn constructor.
     * @param string $table
     * @param string $column
     */
    public function __construct(string $table, string $column)
    {
        $this->alertTable = new AlterTable($table);
        $this->alertColumn = new AlterColumn($column);
    }

    /**
     * build query string
     *
     * @param Blueprint $blueprint
     * @return string
     */
    public function buildQuery(Blueprint $blueprint): string
    {

    }
}
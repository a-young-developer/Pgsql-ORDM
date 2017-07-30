<?php
namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Blueprint;
use Cable\Ordm\Blueprint\Statement\CreateIndex as CreateIndexStatement;

class CreateIndex implements BuilderInterface
{
    /**
     * @var \Cable\Ordm\Blueprint\Statement\CreateIndex
     */
    private $createIndex;

    /**
     * build query string
     *
     * @return string
     */
    public function buildQuery(Blueprint $blueprint): string
    {
        $columns = $blueprint->getColumns();
        $query = '';

        foreach ($columns as $column){
            $indexes = $column->getIndexes();

            if (empty($indexes)) {
                continue;
            }


            foreach ($indexes as $index){
                $query .= (string) $index . ';';
            }
        }

        $query = rtrim($query, ';');

        return $query;
    }
}
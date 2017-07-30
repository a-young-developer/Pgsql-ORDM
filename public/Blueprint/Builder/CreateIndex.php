<?php
namespace Cable\Ordm\Blueprint\Builder;


use Cable\Ordm\Blueprint\Blueprint;

class CreateIndex implements BuilderInterface
{
    /**
     * build query string
     *
     * @param Blueprint $blueprint
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

        return $query;
    }
}

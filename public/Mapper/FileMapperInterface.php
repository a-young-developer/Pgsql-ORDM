<?php

namespace Cable\Ordm\Mapper;

use SplFileInfo;
/**
 * Interface FileMapperInterface
 * @package Cable\Ordm\Mapper
 */
interface FileMapperInterface
{

    /**
     * map file by file info
     *
     * @param SplFileInfo $file
     * @return mixed
     */
    public function mapFile(SplFileInfo $file);
}

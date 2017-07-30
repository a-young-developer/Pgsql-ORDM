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
     * @param \SplObjectStorage$files
     * @return mixed
     */
        public function mapFile(\SplObjectStorage $files);
}

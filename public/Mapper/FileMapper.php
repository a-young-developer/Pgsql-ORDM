<?php

namespace Cable\Ordm\Mapper;


class FileMapper implements FileMapperInterface
{
    /**
     * @var string
     */
    private $namespace;

    /**
     * FileMapper constructor.
     * @param string $namespace
     */
    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * map file by file info
     *
     * @param \SplObjectStorage $files
     * @return \SplObjectStorage
     */
    public function mapFile(\SplObjectStorage $files)
    {
        $objects = new \SplObjectStorage();

        foreach ($files as $file){
            $namespaced = $this->namespace.'\\'. explode('.php', $file->getFilename())[0];

            $objects->attach(new $namespaced);
        }

        return $objects;
    }
}
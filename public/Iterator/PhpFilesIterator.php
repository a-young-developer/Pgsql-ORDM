<?php
namespace Cable\Ordm\Iterator;

use Cable\Ordm\Mapper\FileMapperInterface;

class PhpFilesIterator implements IteratorInterface
{

    /**
     * @var string
     */
    private $basePath;

    /**
     * @var FileMapperInterface
     */
    private $mapper;

    /**
     * PhpFilesIterator constructor.
     * @param string $basePath
     * @param FileMapperInterface $mapper
     */
    public function __construct(string $basePath, FileMapperInterface $mapper)
    {
        $this->basePath = $basePath;
        $this->mapper = $mapper;
    }

    /**
     * @return mixed
     */
    public function iterate()
    {
        $directory = new \RecursiveDirectoryIterator($this->basePath);
        $iterator = new \RecursiveIteratorIterator($directory);
        $regex = new \RegexIterator($iterator, '/^.+\.php$/i');

        foreach ($regex as $file){
            $this->mapper->mapFile($file);
        }
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return PhpFilesIterator
     */
    public function setBasePath(string $basePath): PhpFilesIterator
    {
        $this->basePath = $basePath;
        return $this;
    }

    /**
     * @return FileMapperInterface
     */
    public function getMapper(): FileMapperInterface
    {
        return $this->mapper;
    }

    /**
     * @param FileMapperInterface $mapper
     * @return PhpFilesIterator
     */
    public function setMapper(FileMapperInterface $mapper): PhpFilesIterator
    {
        $this->mapper = $mapper;
        return $this;
    }
}

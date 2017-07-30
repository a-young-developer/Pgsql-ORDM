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
     * @var array
     */
    private $ignoreFiles = [];

    /**
     * PhpFilesIterator constructor.
     * @param string $basePath
     */
    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @return array
     */
    public function getIgnoreFiles(): array
    {
        return $this->ignoreFiles;
    }

    /**
     * @param array $ignoreFiles
     * @return PhpFilesIterator
     */
    public function setIgnoreFiles(array $ignoreFiles): PhpFilesIterator
    {
        $this->ignoreFiles = $ignoreFiles;
        return $this;
    }



    /**
     * @return \SplObjectStorage
     */
    public function iterate()
    {
        $directory = new \RecursiveDirectoryIterator($this->basePath);
        $iterator = new \RecursiveIteratorIterator($directory);
        $regex = new \RegexIterator($iterator, '/^.+\.php$/i');

        $files = new \SplObjectStorage();


        foreach ($regex as $file){

            if(array_search($file->getFilename(), $this->ignoreFiles)){
                continue;
            }

            $files->attach($file);
        }

        return $files;
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

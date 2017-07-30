<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cable\Ordm\Annotations;


/**
 * A PSR-4 compatible class loader.
 *
 * See http://www.php-fig.org/psr/psr-4/
 *
 * @author Alexander M. Turek <me@derrabus.de>
 *
 */
class Loader
{
    /**
     * @var array
     */
    private $prefixes = array();

    /**
     * @param string $prefix
     * @param string $baseDir
     */
    public function addPrefix($prefix, $baseDir)
    {
        $prefix = trim($prefix, '\\').'\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
        $this->prefixes[] = array($prefix, $baseDir);
    }

    /**
     * @param string $class
     *
     * @return string|null
     */
    public function findFile($class)
    {
        $class = ltrim($class, '\\');

        foreach ($this->prefixes as list($currentPrefix, $currentBaseDir)) {
            if (0 === strpos($class, $currentPrefix)) {
                $classWithoutPrefix = substr($class, strlen($currentPrefix));
                $file = $currentBaseDir.str_replace('\\', DIRECTORY_SEPARATOR, $classWithoutPrefix).'.php';
                if (file_exists($file)) {
                    return $file;
                }
            }
        }
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function loadClass($class)
    {
        $file = $this->findFile($class);
        if (null !== $file) {
            require $file;

            return true;
        }

        return false;
    }

}

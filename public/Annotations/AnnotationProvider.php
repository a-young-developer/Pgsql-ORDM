<?php

namespace Cable\Ordm\Annotations;


use Cable\Container\ServiceProvider;
use Cable\Ordm\Exceptions\AnnotationNotFoundException;
use Doctrine\Common\Annotations\AnnotationRegistry;

class AnnotationProvider extends ServiceProvider
{

    /**
     * register new providers or something
     *
     * @return void
     */
    public function boot()
    {}

    /**
     * register the content
     *
     * @return void
     */
    public function register()
    {
            AnnotationRegistry::registerLoader(function ($class){
                if (file_exists($path = __DIR__.'/'.$class.'.php')) {
                    include $path;

                    return;
                }

                throw new AnnotationNotFoundException(
                    sprintf('%s annotation could not found')
                );
            });
    }
}
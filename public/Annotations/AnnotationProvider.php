<?php

namespace Cable\Ordm\Annotations;


use Cable\Container\ServiceProvider;
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
        $loader = new Loader();

        $loader->addPrefix('Cable\Ordm\Annotations\\', __DIR__);

        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
    }
}
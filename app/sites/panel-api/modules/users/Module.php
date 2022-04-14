<?php
namespace Users;

use Mvc\Loader;
use Middlewares\Panel;

class Module extends \Mvc\Module
{
    public function register($app)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            __NAMESPACE__ . '\Controllers' => __DIR__ . '/controllers',
        ]);
        $loader->register();

        $app->setDefaultNamespace(__NAMESPACE__ . '\Controllers');
        $app->addMiddleware(new Panel);
    }
}

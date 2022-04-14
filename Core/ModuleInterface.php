<?php
namespace Mvc;

use Mvc\App;

interface ModuleInterface
{    
    /**
     * register
     *
     * @param  mixed $app
     * @return void
     */
    public function register(App $app);
}

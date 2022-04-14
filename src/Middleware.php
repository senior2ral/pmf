<?php
namespace Mvc;

use Mvc\App;
use Mvc\Events\Event;
use Mvc\Exception;
use Mvc\MiddlewareInterface;

class Middleware implements MiddlewareInterface
{
    /**
     * beforeExecuteRoute
     *
     * @param  mixed $event
     * @param  mixed $app
     * @return void
     */
    public function beforeExecuteRoute(Event $event, App $app)
    {}

    /**
     * beforeException
     *
     * @param  mixed $event
     * @param  mixed $app
     * @param  mixed $exception
     * @return void
     */
    public function beforeException(Event $event, App $app, Exception $exception)
    {}
}

<?php
namespace Middlewares;

use Lib\Auth;
use Lib\Lang;
use Lib\Request;
use Lib\Response;
use Models\LogsAccess;
use Models\Translations;
use Models\Users;

class Panel extends \Mvc\Middleware
{
    /**
     * beforeExecuteRoute
     *
     * @param  mixed $app
     * @return void
     */
    public function beforeExecuteRoute($app)
    {
        try {
            $module     = $app->router->getModuleName();
            $controller = $app->router->getControllerName();
            $action     = $app->router->getActionName();

            Lang::setTemplateId(Translations::TEMPLATE_ID_PANEL_API);
            Lang::execute();

            $token = isset($_COOKIE['admin_token']) ? (string) trim($_COOKIE['admin_token']) : (string) trim(Request::get('token'));
            Auth::init($token, [Users::TYPE_MODERATOR]);

            if (!\in_array($module, ['auth', 'settings', 'data'])) {
                $exception = Auth::getException();
                if ($exception instanceof \Exception) {
                    throw $exception;
                }

                $i = new LogsAccess();
                if (Auth::isAuth()) {
                    $i->user_id = Auth::getId();
                }
                $i->query = \array_slice(Request::get(), 0, 100, true);
                $i->set($i);
            }
        } catch (\Exception $e) {
            Response::error($e->getMessage(), $e->getCode());
        }
    }
}

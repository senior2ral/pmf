<?php
namespace Models;

use Lib\Request;

class LogsAccess extends \Lib\ModelManager
{
    public $_id;
    public $user_id;
    public $host;
    public $url;
    public $method = 'GET';
    public $query  = [];
    public $ip;
    public $browser;
    public $created_at;

    /**
     * getSource
     *
     * @return void
     */
    public static function getSource()
    {
        return 'logs_access';
    }

    /**
     * beforeSave
     *
     * @return void
     */
    public function beforeSave($forceInsert = false)
    {
        if (!$this->created_at) {
            $this->created_at = self::getDate();
        }
    }

    /**
     * set
     *
     * @param  mixed $i
     * @return void
     */
    public function set($i)
    {
        $i->browser = Request::getUserAgent();
        $i->ip      = Request::getClientAddress();
        $i->method  = Request::getMethod();
        $i->url     = Request::getScheme() . '://' . Request::getHttpHost() . urldecode(Request::getServer('REQUEST_URI'));
        $i->host    = Request::getHttpHost();
        $i->save();
    }
}

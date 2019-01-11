<?php

class SingletonV1
{
    private static $_instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance) || isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}

class SingleV2
{
    private static $_instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (static::$_instance === null) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }

}

abstract class Single
{
    protected final function __construct()
    {
        $this->init();
    }

    protected final function __clone()
    {
        // TODO: Implement __clone() method.
    }

    protected function init()
    {

    }

    public static function getInstance()
    {
        if (static::$_instance === null) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
}

class A extends Single
{
    protected static $_instance = null;
}

?>
<?php 

namespace Core;

class  app {

    protected static $container;

    public static function setContainer($container)

    {

        static::$container = $container;

    }

    public static function container()
    
    {

        return static::$container;

    }

    public static function resolve($key)

    {

        static::container()->resolve($key);

    }

        public static function bind($key)

    {

        return static::container()->bind($key);

    }

}

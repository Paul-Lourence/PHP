<?php 

namespace Core\middleware;


class middleware 
{

    public const MAP = [
        "guest" => guest::class,
        "auth" => auth::class
    ];

    public static function resolve($key)

    {

        if (!$key) {
            return;
        }

        $middleware = middleware::MAP[$key] ?? false;

        if (!$middleware) {

            throw new \Exception("No matching middleware found for key '$key}'.");

        }

        (new $middleware)->handle();        
    }

}
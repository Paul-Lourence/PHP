<?php

use Core\container;

test("t can resolve something out of the container", function () {
    
    $container = new Container();

    $container->bind("foo", fn() => "bar");

    $result = $container->resolve("foo");

    $expect($result)->toEqual("bar");

});

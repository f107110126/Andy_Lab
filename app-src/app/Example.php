<?php

namespace App;

class Example
{
    protected $foo;

    public function __construct($foo = null)
    {
        $this->foo = $foo;
    }

    public function go()
    {
        dump('it work');
    }

    public function handle()
    {
        die('it work');
    }
}

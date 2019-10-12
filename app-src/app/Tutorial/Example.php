<?php

namespace App\Tutorial;

class Example
{
    protected $Foo;

    public function __construct(Foo $foo)
    {
        $this->Foo = $foo;
    }
}

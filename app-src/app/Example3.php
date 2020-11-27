<?php

namespace App;

class Example3
{
    protected $foo;
    
    protected $collaborator;

    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }
}

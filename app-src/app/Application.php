<?php

namespace App;

// use Illuminate\Foundation\Application;

class Application extends \Illuminate\Foundation\Application
{
    public function publicPath()
    {
        return $this->basePath . DIRECTORY_SEPARATOR . '..';
    }
}

<?php

namespace App\Models;

use Symfony\Component\HttpKernel\KernelInterface;

class Chart
{
    private $app;

    public function __construct(KernelInterface $app)
    {
        $this->app = $app;
    }

    public function returnAppClass()
    {
        return get_class($this->app);
    }

}
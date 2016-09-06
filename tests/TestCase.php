<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    const LL = 1;

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        define("LL","1");
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
}

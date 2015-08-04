<?php

/**
 * Class TestCase
 */
class TestCase extends Illuminate\Foundation\Testing\TestCase
{

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://homestead.app';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    /**
     * for testing logger
     *
     * @return void
     */
    protected function registerTestLogger()
    {
        $this->app->bind('log', function ($app) {
            $logger = new \Illuminate\Log\Writer(
                new \Monolog\Logger('testing'), $app['events']
            );
            (new \Illuminate\Foundation\Bootstrap\ConfigureLogging)
                ->bootstrap($app);

            return $logger;
        });
    }

    /**
     * @param $class
     * @param $name
     *
     * @return \ReflectionMethod
     */
    protected function getProtectMethod($class, $name)
    {
        $class = new \ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    /**
     * @param $class
     * @param $name
     *
     * @return \ReflectionProperty
     */
    protected function getProtectProperty($class, $name)
    {
        $class = new \ReflectionClass($class);
        $property = $class->getProperty($name);
        $property->setAccessible(true);

        return $property;
    }
}

<?php
/**
 * Class OverrideDatabaseConnections
 */

/**
 * OverrideDatabaseConnections
 * for testing database connections
 */
trait OverrideDatabaseConnections
{
    /**
     * @return void
     */
    protected function overrideDatabase()
    {
        config([
            'database.connections.master' => $this->forceDatabaseConnectionConfigure(),
            'database.connections.slave'  => $this->forceDatabaseConnectionConfigure(),
        ]);
    }

    /**
     * @return array
     */
    private function forceDatabaseConnectionConfigure()
    {
        return [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
            'options'  => [
                \PDO::ATTR_PERSISTENT => true,
            ]
        ];
    }
}
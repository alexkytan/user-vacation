<?php

namespace UserVacation\DB;

use UserVacation\Helpers\{
    Helper, Logger
};

class DB
{
    /**
     * @var null|\PDO
     */
    private static $instance = null;

    public static function get()
    {
        if (self::$instance) {
            try {
                $dbSettings = Helper::config('db');

                $dsn = $dbSettings['dbms'] . ':dbname=' . $dbSettings['db_name'] . ';host=' . $dbSettings['host'];

                self::$instance = new \PDO(
                    $dsn,
                    $dbSettings['username'],
                    $dbSettings['password']
                );
            } catch (\PDOException $e) {
                Logger::logException($e);
            }
        }

        return self::$instance;
    }
}
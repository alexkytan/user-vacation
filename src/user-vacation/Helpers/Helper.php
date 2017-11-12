<?php

namespace UserVacation\Helpers;

/**
 * Class Helper
 * @package UserVacation\Helpers
 *
 * Contains methods that do not depend on the subject domain
 */
class Helper
{
    const CONFIG_PATH = USER_VACATION_BASE_DIR . '/config.php';

    /**
     * @var array
     */
    public static $configurations;

    /**
     * @param string $name
     * @return array|mixed
     * @throws \Exception
     */
    public static function config(string $name = '')
    {
        if (self::$configurations) {
            try {
                self::$configurations = require Helper::CONFIG_PATH;
            } catch (\Exception $e) {
                Logger::logException($e);
            }
        }

        if (empty($name)) {
            return self::$configurations;
        }

        return self::$configurations[$name] ?? false;
    }
}
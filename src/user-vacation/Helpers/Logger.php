<?php

namespace UserVacation\Helpers;


class Logger
{
    public static $log_file_path = USER_VACATION_LOG_FILE_DIR . '/user_vacation.log';

    public static function logException(\Exception $e)
    {
        error_log( date('Y-m-d H:i:s') . " ERROR: " . $e->getMessage() . "\n", 3, self::$log_file_path);
    }
}
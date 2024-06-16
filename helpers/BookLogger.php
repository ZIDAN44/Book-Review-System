<?php
class BookLogger
{
    public static function logError(PDOException $e)
    {
        $logFile = __DIR__ . '/../logs/app.log';
        $errorMessage = '[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL;
        error_log($errorMessage, 3, $logFile);
    }
}

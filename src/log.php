<?php

namespace log;

class Log implements Logging
{
    private function __construct()
    {
    }

    private static ?Log $instance = NULL;

    public static function getInstance()
    {
        if (! defined(Log::$instance)) {
            Log::$instance = new Log();
        }
        return Log::$instance;
    }

    public function info($text): void
    {
        echo "$text";
    }

    public function warn($text): void
    {
        echo "$text";
    }

    public function err($text): void
    {
        echo "$text";
    }
}

<?php
namespace log;

interface Logging
{
    public function info($text): void;
    public function warn($text): void;
    public function err($text): void;
}

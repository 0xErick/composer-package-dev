<?php

namespace Saqing\ComposerPackageDev;

class Ping
{
    public $result;

    function __construct($host, $port, $timeout)
    {
        $timeA = microtime(true);
        try {
            $fp = fsockopen($host, $port, $errCode, $errStr, $timeout);
            if ($fp) {
                // It worked
                $timeB = microtime(true);
                $result = round((($timeB - $timeA) * 1000), 0) . " ms";

            } else {
                // It didn't work
                $result = "down";
            }
            fclose($fp);
        } catch (\ErrorException $e) {
            $result = "down";
        }

        $this->result = $result;
    }
}